import cv2
import mediapipe as mp
import numpy as np
from flask import Flask, Response, jsonify, request
from flask_cors import CORS
import pickle

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
score = 0
set_counter = 0

# Add a global variable to store the workout type
workout = ""  # Initial value; replace with an actual workout type when received

# Variable to hold the loaded model
model = None
"""
def load_model(workout_type):
    global model
    if workout_type == "Plank":
        with open('script/classifier_plank.pkl', 'rb') as model_file:
            model = pickle.load(model_file)
    elif workout_type == "Push-Up":
        with open('script/classifier_pushup.pkl', 'rb') as model_file:
            model = pickle.load(model_file)
    elif workout_type == "Squat":
        with open('script/classifier_squat.pkl', 'rb') as model_file:
            model = pickle.load(model_file)
    else:
"""
with open('script/model.pkl', 'rb') as model_file:
    model = pickle.load(model_file)

def generate_frames():
    global workout, model
    while cap.isOpened():
        global latest_prediction, reps, sets, stage, total_time, score
        # read the camera frame
        success, frame = cap.read()
        if not success:
            prediction = {"workout": "No data"}
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

                workout_landmarks = get_workout_landmarks(landmarks)
                workout_angles = calculate_workout_angles(workout, workout_landmarks)
                draw_workout_angles(frame, workout, workout_landmarks, workout_angles)

                output = workout_tracker(workout, workout_angles)

                reps = output[0]
                sets = output[1]
                stage = output[2]
                total_time = output[3]
                score = output[4]

                # Convert landmarks to a flat list
                landmarks_flat = np.array([[lm.x, lm.y, lm.z, lm.visibility] for lm in landmarks]).flatten()
                if model:
                    # Make prediction if model is loaded
                    prediction = model.predict([landmarks_flat])
                    # Update latest prediction for access by the JSON endpoint
                    latest_prediction = {"prediction": prediction[0]}
                else:
                    latest_prediction = {"prediction": "No model loaded"}
                    
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

def workout_tracker(workout, workout_angles):
    # Variables to track workout
    global reps, sets, stage, total_time, score, start_time, elapsed_time, set_counter

    if stage == "completed":
        return reps, sets, stage, total_time, score
    
    target_reps = 12
    target_sets = 3
    target_time = 0

    # Track for Plank
    if workout in ["Plank"]:
        if 55 < workout_angles["right_elbow_angle"] < 125:
            if workout_angles["right_knee_angle"] >= 170 or workout_angles["left_knee_angle"] >= 170:
                if start_time is None:
                    start_time = cap.get(cv2.CAP_PROP_POS_FRAMES) / 1000
                elapsed_time = (cap.get(cv2.CAP_PROP_POS_FRAMES) / 1000) - start_time
        elif 55 < workout_angles["left_elbow_angle"] < 125:
            if workout_angles["right_knee_angle"] >= 170 or workout_angles["left_knee_angle"] >= 170:
                if start_time is None:
                    start_time = cap.get(cv2.CAP_PROP_POS_FRAMES) / 1000
                elapsed_time = (cap.get(cv2.CAP_PROP_POS_FRAMES) / 1000) - start_time
        else:
            start_time = None
            elapsed_time = 0

        total_time = f"{elapsed_time: .2f} sec"

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
            stage = "up"

        if (35 < workout_angles["right_elbow_angle"] < 55) and (35 < workout_angles["left_elbow_angle"] < 55):
            stage = "down"
        elif (workout_angles["right_elbow_angle"] < 35) and (workout_angles["left_elbow_angle"] < 35):
            stage = "You are too low"
        elif (workout_angles["right_elbow_angle"] > 55) or (workout_angles["left_elbow_angle"] > 55):
            if stage == "down":
                stage = "up"
                reps += 1
            if stage == "You are too low":
                stage = "up"

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
            stage = "up"

        if (35 < workout_angles["right_knee_angle"] < 55) and (35 < workout_angles["left_knee_angle"] < 55):
            stage = "down"
        elif (workout_angles["right_knee_angle"] < 35) and (workout_angles["left_knee_angle"] < 35):
            stage = "You are too low"
        elif (workout_angles["right_knee_angle"] > 55) or (workout_angles["left_knee_angle"] > 55):
            if stage == "down":
                stage = "up"
                reps += 1
            if stage == "You are too low":
                stage = "up"

    return reps, sets, stage, total_time, score

def get_workout_landmarks(landmarks):
    # Get coordinates for workout-related landmarks
    workout_landmarks = {
        "right_shoulder": [landmarks[mp_pose.PoseLandmark.RIGHT_SHOULDER.value].x, landmarks[mp_pose.PoseLandmark.RIGHT_SHOULDER.value].y],
        "right_elbow": [landmarks[mp_pose.PoseLandmark.RIGHT_ELBOW.value].x, landmarks[mp_pose.PoseLandmark.RIGHT_ELBOW.value].y],
        "right_wrist": [landmarks[mp_pose.PoseLandmark.RIGHT_WRIST.value].x, landmarks[mp_pose.PoseLandmark.RIGHT_WRIST.value].y],
        "right_hip": [landmarks[mp_pose.PoseLandmark.RIGHT_HIP.value].x, landmarks[mp_pose.PoseLandmark.RIGHT_HIP.value].y],
        "right_knee": [landmarks[mp_pose.PoseLandmark.RIGHT_KNEE.value].x, landmarks[mp_pose.PoseLandmark.RIGHT_KNEE.value].y],
        "right_ankle": [landmarks[mp_pose.PoseLandmark.RIGHT_ANKLE.value].x, landmarks[mp_pose.PoseLandmark.RIGHT_ANKLE.value].y],
        "left_shoulder": [landmarks[mp_pose.PoseLandmark.LEFT_SHOULDER.value].x, landmarks[mp_pose.PoseLandmark.LEFT_SHOULDER.value].y],
        "left_elbow": [landmarks[mp_pose.PoseLandmark.LEFT_ELBOW.value].x, landmarks[mp_pose.PoseLandmark.LEFT_ELBOW.value].y],
        "left_wrist": [landmarks[mp_pose.PoseLandmark.LEFT_WRIST.value].x, landmarks[mp_pose.PoseLandmark.LEFT_WRIST.value].y],
        "left_hip": [landmarks[mp_pose.PoseLandmark.LEFT_HIP.value].x, landmarks[mp_pose.PoseLandmark.LEFT_HIP.value].y],
        "left_knee": [landmarks[mp_pose.PoseLandmark.LEFT_KNEE.value].x, landmarks[mp_pose.PoseLandmark.LEFT_KNEE.value].y],
        "left_ankle": [landmarks[mp_pose.PoseLandmark.LEFT_ANKLE.value].x, landmarks[mp_pose.PoseLandmark.LEFT_ANKLE.value].y],
    }
    return workout_landmarks

def calculate_workout_angles(workout, workout_landmarks): 
    # Calculate angles based on landmark coordinates
    if workout in ["Plank", "Push-Up"]:
         # Calculate angles for plank/pushup
        workout_angles = {
            "right_elbow_angle": calculate_angle(workout_landmarks["right_wrist"], workout_landmarks["right_elbow"], workout_landmarks["right_shoulder"]),
            "left_elbow_angle": calculate_angle(workout_landmarks["left_wrist"], workout_landmarks["left_elbow"], workout_landmarks["left_shoulder"]),
            "right_knee_angle": calculate_angle(workout_landmarks["right_hip"], workout_landmarks["right_knee"], workout_landmarks["right_ankle"]),
            "left_knee_angle": calculate_angle(workout_landmarks["left_hip"], workout_landmarks["left_knee"], workout_landmarks["left_ankle"])
        }
    else:
         # Calculate angles for squat
        workout_angles = {
            "right_hip_angle": calculate_angle(workout_landmarks["right_shoulder"], workout_landmarks["right_hip"], workout_landmarks["right_knee"]),
            "left_hip_angle": calculate_angle(workout_landmarks["left_shoulder"], workout_landmarks["left_hip"], workout_landmarks["left_knee"]),
            "right_knee_angle": calculate_angle(workout_landmarks["right_hip"], workout_landmarks["right_knee"], workout_landmarks["right_ankle"]),
            "left_knee_angle": calculate_angle(workout_landmarks["left_hip"], workout_landmarks["left_knee"], workout_landmarks["left_ankle"])
        }
    return workout_angles

def draw_workout_angles(frame, workout, workout_landmarks, workout_angles):
    # Helper function to draw text on frame
    def draw_angle_text(angle_name, landmark):
        coord = tuple(np.multiply(landmark, [frame.shape[1], frame.shape[0]]).astype(int))
        cv2.putText(frame, f"{workout_angles[angle_name]:.2f}", coord, cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), 2, cv2.LINE_AA)

    if workout in ["Plank", "Push-Up"]:
        # Draw each angle on the frame for plank/pushup
        draw_angle_text("right_elbow_angle", workout_landmarks["right_elbow"])
        draw_angle_text("left_elbow_angle", workout_landmarks["left_elbow"])
        draw_angle_text("right_knee_angle", workout_landmarks["right_knee"])
        draw_angle_text("left_knee_angle", workout_landmarks["left_knee"])
    else:
        # Draw each angle on the frame for squat
        draw_angle_text("right_hip_angle", workout_landmarks["right_hip"])
        draw_angle_text("right_knee_angle", workout_landmarks["right_knee"])
        draw_angle_text("left_hip_angle", workout_landmarks["left_hip"])
        draw_angle_text("left_knee_angle", workout_landmarks["left_knee"])
        
@app.route('/video_feed')
def video_feed():
    # Stream the video frames as a multipart response
    return Response(generate_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/get_prediction')
def get_prediction():
    result = {
        "latest_prediction": latest_prediction,
        "repetitions": reps,
        "sets": sets,
        "stage": stage,
        "total_time": total_time,
        "score": score
    }
    return jsonify(result)

@app.route('/set_workout', methods=['POST'])
def set_workout():
    global workout, model, reps
    reps = 0
    data = request.get_json()
    new_workout = data.get("workout", "")
    if new_workout != workout:
        workout = new_workout
        #load_model(workout)
    return jsonify({"status": "success", "workout": workout})

if __name__ == "__main__":
    app.run(host = "0.0.0.0", port = 5000, debug=True)