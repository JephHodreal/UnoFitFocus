@echo off

start cmd /k "php artisan serve --host=127.0.0.1 --port=8000"
start cmd /k "python C:/xampp/htdocs/UnoFitFocus/script/mediapipe_stream.py"
start cmd /k "cd /d C:/xampp/htdocs/UnoFitFocus && npm run dev"

echo Laravel and Flask servers are running!
