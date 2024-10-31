@echo off

start cmd /k "php artisan serve --host=127.0.0.1 --port=8000"
start cmd /k "python C:/xampp/htdocs/UnoFitFocus/script/mediapipe_stream.py"

echo Laravel and Flask servers are running!
