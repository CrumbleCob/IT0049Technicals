@echo off
setlocal
title Technical Summative 2
cd /d "%~dp0"

if not exist "_runtime\vendor\autoload.php" (
  echo Please run SETUP.bat first.
  pause
  exit /b 1
)

cd /d "_runtime"
echo.
echo The app is running at http://localhost:8082
echo This separate port prevents an older project from opening.
echo Keep this window open. Press Ctrl+C to stop.
start "" powershell -NoProfile -WindowStyle Hidden -Command "Start-Sleep -Seconds 2; Start-Process 'http://localhost:8082'"
php spark serve --port 8082
pause
