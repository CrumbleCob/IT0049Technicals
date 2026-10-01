@echo off
cd /d "%~dp0Technical Summative One Project"

if not exist "spark" (
    echo Run SETUP.bat first.
    pause
    exit /b 1
)

start "" "http://localhost:8080"
echo Keep this window open while using the website.
php spark serve
pause
