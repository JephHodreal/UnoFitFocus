import cv2
import mediapipe as mp
import numpy as np
from flask import Flask, Response

app = Flask(__name__)

# Instantiate camera
cap = cv2.VideoCapture(0)

# Instantiate mediapipe
mp_pose = mp.solutions.pose
pose = mp_pose.Pose()
mp_drawing = mp.solutions.drawing_utils

def generate_frames():
    while cap.isOpened():
            
        # read the camera frame
        success, frame = cap.read()
        if not success:
            break
        else:
            # Convert the frame to RGB
            frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
            # Process the frame with MediaPipe Pose
            results = pose.process(frame_rgb)
            # Draw the pose annotation on the frame
            if results.pose_landmarks:
                # Extract landmarks
                landmarks = results.pose_landmarks.landmark
                mp_drawing.draw_landmarks(frame, results.pose_landmarks, mp_pose.POSE_CONNECTIONS)
                
                # Convert landmarks to a flat list
                #landmarks_flat = np.array([[lm.x, lm.y, lm.z, lm.visibility] for lm in landmarks]).flatten()
                # Make prediction
                #prediction = clf_plank.predict([landmarks_flat])
                # Display prediction on the frame
                #cv2.putText(frame, f'Prediction: {prediction[0]}', (10, 30), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), 2, cv2.LINE_AA)
            # Encode the frame in JPEG format
            ret, buffer = cv2.imencode('.jpg', frame)
            frame = buffer.tobytes()
            # Yield the frame in byte format
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

@app.route('/video_feed')
def video_feed():
    # Stream the video frames as a multipart response
    return Response(generate_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__ == "__main__":
    app.run(host = "0.0.0.0", port = 5000, debug=True)


"""          
while cap.isOpened():
    ret, frame = cap.read()
    if not ret:
        break
    else: 
        # Convert the frame to RGB
        frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
        # Process the frame with MediaPipe Pose
        results = pose.process(frame_rgb)

        # Draw the pose landmarks on the frame
        if results.pose_landmarks:
            mp_drawing.draw_landmarks(frame, results.pose_landmarks, mp_pose.POSE_CONNECTIONS)

        # Display the frame
        cv2.imshow('MediaPipe Pose', frame)

        if cv2.waitKey(10) & 0xFF == ord('q'):
            break

cap.release()
cv2.destroyAllWindows()
"""