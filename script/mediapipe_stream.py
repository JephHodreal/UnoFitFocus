import cv2
import mediapipe as mp
import numpy as np
import time
from model import label_encoder
from flask import Flask, Response, jsonify, request
from flask_cors import CORS
import pickle
import json

app = Flask(__name__)
CORS(app)

# Instantiate camera
cap = cv2.VideoCapture(0)

# Instantiate mediapipe
mp_pose = mp.solutions.pose
pose = mp_pose.Pose()
mp_drawing = mp.solutions.drawing_utils

# Store latest prediction
latest_prediction = {"prediction": "No data"}

reps = 0
sets = "0/3"
stage = None
total_time = ""
start_time = None
elapsed_time = 0
raw_score = 0
score = "0"
modalScore1 = 0
modalScore2 = 0
set_counter = 0
overall_start_time = None

# Add a global variable to store the workout type
workout = ""  # Initial value; replace with an actual workout type when received
difficulty = "" # Initial value; replace with an actual difficulty when received

with open('script/model.pkl', 'rb') as model_file:
    model = pickle.load(model_file)

def generate_delay_frames():
    while cap.isOpened():
        success, frame = cap.read()  # Capture frame-by-frame
        if not success:
            break
        else:
            # Encode the frame to JPEG format
            ret, buffer = cv2.imencode('.jpg', frame)
            if not ret:
                break
            frame = buffer.tobytes()  # Convert frame to bytes
            # Yield the frame as a multipart response
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

def generate_frames():
    global workout, difficulty, model
    while cap.isOpened():
        global reps, sets, stage, total_time, score
        # read the camera frame
        success, frame = cap.read()
        if not success:
            reps = 0
            sets = "0/3"
            stage = None
            total_time = ""
            score = 0
            break
        else:
            # Convert the frame to RGB
            frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
            frame_rgb.flags.writeable = False
            # Process the frame with MediaPipe Pose
            results = pose.process(frame_rgb)
            # Recolor image back to BGR image
            frame_rgb.flags.writeable = True
            frame = cv2.cvtColor(frame_rgb, cv2.COLOR_RGB2BGR)

            # Draw the pose annotation on the frame
            if results.pose_landmarks:
                # Extract landmarks
                landmarks = results.pose_landmarks.landmark
                mp_drawing.draw_landmarks(frame, results.pose_landmarks, mp_pose.POSE_CONNECTIONS)

                workout_visibility = get_workout_visibility(landmarks)
                workout_landmarks = get_workout_landmarks(landmarks)
                workout_angles = calculate_workout_angles(workout_landmarks, workout_visibility)
                draw_workout_angles(frame, workout, workout_landmarks, workout_angles)

                output = workout_tracker(workout, difficulty, workout_angles, model)

                reps = output[0]
                sets = output[1]
                stage = output[2]
                total_time = output[3]
                score = output[4]
                    
            # Encode the frame in JPEG format
            ret, buffer = cv2.imencode('.jpg', frame)
            frame = buffer.tobytes()
            # Yield the frame in byte format
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

def calculate_angle(a, b, c):
    a = np.array(a)
    b = np.array(b)
    c = np.array(c)

    radians = np.arctan2(c[1] - b[1], c[0] - b[0]) - np.arctan2(a[1] - b[1], a[0] - b[0])
    angle = np.abs(radians * 180.0 / np.pi)

    if angle > 180.0:
        angle = 360 - angle

    return angle

def workout_tracker(workout, difficulty, workout_angles, model):

    # Variables to track workout
    global reps, sets, stage, total_time, raw_score, score, start_time, elapsed_time, set_counter, latest_prediction, modalScore1, modalScore2, overall_start_time, signal

    signal = None

    if stage == "completed":
        overall_elapsed_time = 0
        elapsed_time = 0
        raw_score = 0
        return reps, sets, stage, total_time, score, modalScore1, modalScore2
    
    if difficulty in ["Beginner"]:
        target_reps = 12
        target_sets = 3
        target_time = 60
    elif difficulty in ["Intermediate"]:
        difficulty = "Standard"
        target_reps = 20
        target_sets = 3
        target_time = 30
    elif difficulty in ["Advanced"]:
        difficulty = "Standard"
        target_reps = 30
        target_sets = 3
        target_time = 60

    input_data = [workout.lower().replace("-", ""), difficulty.lower()] + list(workout_angles.values())
    input_data = np.array(input_data).reshape(1, -1)

    # Debugging: Print input data with angle names
    print("Input data for prediction:")
    print(f"workout: {workout.lower().replace('-', '')}")
    print(f"difficulty: {difficulty.lower()}")

    for angle_name, angle_value in workout_angles.items():
        print(f"{angle_name}: {angle_value}")

    # Check if at least one angle is 0
    if any(angle == 0 for angle in workout_angles.values()):
        print("At least one angle is not found.")
        latest_prediction = {"prediction": "At least 1 angle is not found. No"}
        return reps, sets, "at least one angle is not found", total_time, score, modalScore1, modalScore2
    
    if model:
        # Make prediction if model is loaded
        prediction = model.predict(input_data)
        # Convert numerical prediction back to original string label
        decoded_prediction = label_encoder.inverse_transform(prediction)
        # Update latest prediction for access by the JSON endpoint
        latest_prediction = {"prediction": decoded_prediction[0]}
    else:
        latest_prediction = {"prediction": "No model loaded"}

    print({"prediction": prediction})

    # Track for Plank
    if workout in ["Plank"]:
        # Start overall timer when the user first assumes correct posture
        if overall_start_time is None and prediction == 0 and (55 < workout_angles["right_elbow_angle"] < 125 and 55 < workout_angles["left_elbow_angle"] < 125):
            overall_start_time = time.time()

        # Check if the user is in the correct posture
        if prediction == 0 and (55 < workout_angles["right_elbow_angle"] < 125 or 55 < workout_angles["left_elbow_angle"] < 125):
            if start_time is None:
                # Start or resume the correct posture timer
                start_time = time.time() - elapsed_time
                signal = "correct_sound"
            elapsed_time = time.time() - start_time
        else:
            # Pause correct posture timer when posture breaks
            if start_time is not None:
                elapsed_time = time.time() - start_time
                start_time = None
                signal = "error_sound"

        # Calculate overall elapsed time
        if overall_start_time is not None:
            overall_elapsed_time = time.time() - overall_start_time
            # Check if target time for overall timer is met
            if overall_elapsed_time >= target_time:
                stage = "completed"
        else:
            overall_elapsed_time = 0

        # Display times
        if elapsed_time >= target_time:
            elapsed_time = target_time
        raw_score = (elapsed_time / target_time) * 100

        if stage != "completed":
            total_time = f"{overall_elapsed_time:.2f}"
            score = f"{raw_score:.2f}"
        else:
            total_time = f"{target_time: .2f}"
            score = f"{raw_score:.2f}"

    # Track for Push-Up
    elif workout in ["Push-Up"]:
        # Check if target reps reached
        if reps == target_reps:
            set_counter += 1
            sets = f"{set_counter}/{target_sets}"
            reps = 0  # Reset reps for next set

        # Final check to maintain total sets
        if set_counter >= target_sets:
            sets = f"{target_sets}/{target_sets}"
            stage = "completed"

        if stage == None:
            stage = "rest"

        if (0 < workout_angles["right_elbow_angle"] < 55) and (0 < workout_angles["left_elbow_angle"] < 55):
            if (prediction == 0):
                stage = "down"
                signal = "down_sound"
            elif (prediction == 1):
                stage = "You are too low"
                signal = "error_sound"
        elif (workout_angles["right_elbow_angle"] > 55) and (workout_angles["left_elbow_angle"] > 55):
            if stage == "down":
                stage = "up"
                reps += 1
                if (prediction == 0):
                    raw_score += 1
                    signal = "correct_sound"
            if stage == "You are too low":
                stage = "up"
                reps += 1
                #signal = "up_sound"

    # Track for Squat
    elif workout in ["Squat"]:
        # Check if target reps reached
        if reps == target_reps:
            set_counter += 1
            sets = f"{set_counter}/{target_sets}"
            reps = 0  # Reset reps for next set

        # Final check to maintain total sets
        if set_counter >= target_sets:
            sets = f"{target_sets}/{target_sets}"
            stage = "completed"

        if stage == None:
            stage = "rest"

        if (0 < workout_angles["right_knee_angle"] < 55) and (0 < workout_angles["left_knee_angle"] < 55):
            if (prediction == 0):
                stage = "down"
                signal = "down_sound"
            elif (prediction == 1):
                stage = "You are too low"
                signal = "error_sound"
        elif (workout_angles["right_knee_angle"] > 55) and (workout_angles["left_knee_angle"] > 55):
            if stage == "down":
                stage = "up"
                reps += 1
                if (prediction == 0):
                    raw_score += 1
                    signal = "correct_sound"
            if stage == "You are too low":
                stage = "up"
                reps += 1
                #signal = "up_sound"

    if workout in ["Plank"]:
        modalScore2 = f"{total_time}/{target_time}"
        modalScore2 = score
    elif workout in ["Push-Up", "Squat"]:
        score = f"{raw_score}/{(target_reps * target_sets)} {(raw_score / (target_reps * target_sets)) * 100: .0f}"
        modalScore1 = f"{raw_score}/{(target_reps * target_sets)}"
        modalScore2 = f"{(raw_score / (target_reps * target_sets)) * 100: .2f}"
    return reps, sets, stage, total_time, score, modalScore1, modalScore2, signal

def get_workout_visibility(landmarks):
    # Get coordinates for workout-related landmarks
    workout_visibility = {}
    
    # List of relevant landmarks
    landmark_names = [
        ("right_shoulder", mp_pose.PoseLandmark.RIGHT_SHOULDER),
        ("right_elbow", mp_pose.PoseLandmark.RIGHT_ELBOW),
        ("right_wrist", mp_pose.PoseLandmark.RIGHT_WRIST),
        ("right_hip", mp_pose.PoseLandmark.RIGHT_HIP),
        ("right_knee", mp_pose.PoseLandmark.RIGHT_KNEE),
        ("right_ankle", mp_pose.PoseLandmark.RIGHT_ANKLE),
        ("left_shoulder", mp_pose.PoseLandmark.LEFT_SHOULDER),
        ("left_elbow", mp_pose.PoseLandmark.LEFT_ELBOW),
        ("left_wrist", mp_pose.PoseLandmark.LEFT_WRIST),
        ("left_hip", mp_pose.PoseLandmark.LEFT_HIP),
        ("left_knee", mp_pose.PoseLandmark.LEFT_KNEE),
        ("left_ankle", mp_pose.PoseLandmark.LEFT_ANKLE),
    ]
    
    # Extract coordinates for landmarks with sufficient visibility
    for name, landmark_enum in landmark_names:
        landmark = landmarks[landmark_enum.value]
        workout_visibility[name] = [landmark.visibility]
    
    return workout_visibility

def get_workout_landmarks(landmarks):
    # Get coordinates for workout-related landmarks
    workout_landmarks = {}
    
    # List of relevant landmarks
    landmark_names = [
        ("right_shoulder", mp_pose.PoseLandmark.RIGHT_SHOULDER),
        ("right_elbow", mp_pose.PoseLandmark.RIGHT_ELBOW),
        ("right_wrist", mp_pose.PoseLandmark.RIGHT_WRIST),
        ("right_hip", mp_pose.PoseLandmark.RIGHT_HIP),
        ("right_knee", mp_pose.PoseLandmark.RIGHT_KNEE),
        ("right_ankle", mp_pose.PoseLandmark.RIGHT_ANKLE),
        ("left_shoulder", mp_pose.PoseLandmark.LEFT_SHOULDER),
        ("left_elbow", mp_pose.PoseLandmark.LEFT_ELBOW),
        ("left_wrist", mp_pose.PoseLandmark.LEFT_WRIST),
        ("left_hip", mp_pose.PoseLandmark.LEFT_HIP),
        ("left_knee", mp_pose.PoseLandmark.LEFT_KNEE),
        ("left_ankle", mp_pose.PoseLandmark.LEFT_ANKLE),
    ]
    
    # Extract coordinates for landmarks with sufficient visibility
    for name, landmark_enum in landmark_names:
        landmark = landmarks[landmark_enum.value]
        workout_landmarks[name] = [landmark.x, landmark.y]
    
    return workout_landmarks

def calculate_workout_angles(workout_landmarks, workout_visibility, visibility_threshold = 0.5): 
    # Calculate angles
    workout_angles = {
        "left_elbow_angle": calculate_angle(workout_landmarks["left_wrist"], workout_landmarks["left_elbow"], workout_landmarks["left_shoulder"]),
        "right_elbow_angle": calculate_angle(workout_landmarks["right_wrist"], workout_landmarks["right_elbow"], workout_landmarks["right_shoulder"]),
        "left_hip_angle": calculate_angle(workout_landmarks["left_shoulder"], workout_landmarks["left_hip"], workout_landmarks["left_knee"]),
        "right_hip_angle": calculate_angle(workout_landmarks["right_shoulder"], workout_landmarks["right_hip"], workout_landmarks["right_knee"]),
        "left_knee_angle": calculate_angle(workout_landmarks["left_hip"], workout_landmarks["left_knee"], workout_landmarks["left_ankle"]),
        "right_knee_angle": calculate_angle(workout_landmarks["right_hip"], workout_landmarks["right_knee"], workout_landmarks["right_ankle"])
    }
    
    # Check visibility for each angle
    if (workout_visibility["left_wrist"][0] < visibility_threshold and workout_visibility["left_elbow"][0] < visibility_threshold and workout_visibility["left_shoulder"][0] < visibility_threshold):
        workout_angles["left_elbow_angle"] = 0

    if (workout_visibility["right_wrist"][0] < visibility_threshold and workout_visibility["right_elbow"][0] < visibility_threshold and workout_visibility["right_shoulder"][0] < visibility_threshold):
        workout_angles["right_elbow_angle"] = 0

    if (workout_visibility["left_shoulder"][0] < visibility_threshold and workout_visibility["left_hip"][0] < visibility_threshold and workout_visibility["left_knee"][0] < visibility_threshold):
        workout_angles["left_hip_angle"] = 0

    if (workout_visibility["right_shoulder"][0] < visibility_threshold and workout_visibility["right_hip"][0] < visibility_threshold and workout_visibility["right_knee"][0] < visibility_threshold):
        workout_angles["right_hip_angle"] = 0

    if (workout_visibility["left_hip"][0] < visibility_threshold and workout_visibility["left_knee"][0] < visibility_threshold and workout_visibility["left_ankle"][0] < visibility_threshold):
        workout_angles["left_knee_angle"] = 0

    if (workout_visibility["right_hip"][0] < visibility_threshold and workout_visibility["right_knee"][0] < visibility_threshold and workout_visibility["right_ankle"][0] < visibility_threshold):
        workout_angles["right_knee_angle"] = 0
    
    if abs(workout_visibility["left_elbow"][0] - workout_visibility["right_elbow"][0]) > .50:
        if (workout_visibility["left_elbow"][0] > workout_visibility["right_elbow"][0]):
            workout_angles["right_elbow_angle"] = workout_angles["left_elbow_angle"]
        else:
            workout_angles["left_elbow_angle"] = workout_angles["right_elbow_angle"]

    if abs(workout_visibility["left_hip"][0] - workout_visibility["right_hip"][0]) > .50:
        if (workout_visibility["left_hip"][0] > workout_visibility["right_hip"][0]):
            workout_angles["right_hip_angle"] = workout_angles["left_hip_angle"]
        else:
            workout_angles["left_hip_angle"] = workout_angles["right_hip_angle"]

    if abs(workout_visibility["left_knee"][0] - workout_visibility["right_knee"][0]) > .50:
        if (workout_visibility["left_knee"][0] > workout_visibility["right_knee"][0]):
            workout_angles["right_knee_angle"] = workout_angles["left_knee_angle"]
        else:
            workout_angles["left_knee_angle"] = workout_angles["right_knee_angle"]

    return workout_angles

def draw_workout_angles(frame, workout, workout_landmarks, workout_angles):
    # Helper function to draw text on frame
    def draw_angle_text(angle_name, landmark):
        coord = tuple(np.multiply(landmark, [frame.shape[1], frame.shape[0]]).astype(int))
        cv2.putText(frame, f"{workout_angles[angle_name]:.2f}", coord, cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), 2, cv2.LINE_AA)

    draw_angle_text("right_elbow_angle", workout_landmarks["right_elbow"])
    draw_angle_text("left_elbow_angle", workout_landmarks["left_elbow"])
    draw_angle_text("right_knee_angle", workout_landmarks["right_knee"])
    draw_angle_text("left_knee_angle", workout_landmarks["left_knee"])
    draw_angle_text("left_hip_angle", workout_landmarks["left_hip"])
    draw_angle_text("left_knee_angle", workout_landmarks["left_knee"])
        
@app.route('/video_feed')
def video_feed():
    # Stream the video frames as a multipart response
    return Response(generate_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/delay_feed')
def delay_feed():
    return Response(generate_delay_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/get_prediction')
def get_prediction():
    result = {
        "latest_prediction": latest_prediction,
        "repetitions": reps,
        "sets": sets,
        "stage": stage,
        "total_time": total_time,
        "score": score,
        "modalScore1": modalScore1,
        "modalScore2": modalScore2,
        "signal": signal
    }
    return jsonify(result)

@app.route('/set_workout', methods=['POST'])
def set_workout():
    global workout, model, reps, sets, start_time, stage, set_counter, score, difficulty, overall_start_time, raw_score
    reps = 0
    sets = "0/3"
    set_counter = 0
    raw_score = 0
    score = ""
    start_time = None
    stage = None
    overall_start_time = None
    data = request.get_json()
    new_workout = data.get("workout", "")
    difficulty = data.get("difficulty", "")
    if new_workout != workout:
        workout = new_workout
        #load_model(workout)
    return jsonify({"status": "success", "workout": workout})

if __name__ == "__main__":
    app.run(host = "0.0.0.0", port = 5000, debug=True)