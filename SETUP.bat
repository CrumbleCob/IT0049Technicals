@echo off
setlocal
cd /d "%~dp0"
title Technical Summative One Setup

echo =============================================
echo        TECHNICAL SUMMATIVE ONE SETUP
echo =============================================
echo.
echo Start MySQL in XAMPP and create the TechSum
echo database in phpMyAdmin before continuing.
echo.
pause

where php >nul 2>&1
if errorlevel 1 goto :missing
where composer >nul 2>&1
if errorlevel 1 goto :missing

if exist "Technical Summative One Project" (
    echo The project is already installed.
    echo Use START.bat to open it.
    pause
    exit /b 0
)

echo Creating the official CodeIgniter project...
call composer create-project codeigniter4/appstarter "Technical Summative One Project" --no-interaction
if errorlevel 1 goto :failed

echo Adding your activity files...
xcopy "app" "Technical Summative One Project\app" /E /I /Y >nul
xcopy "public" "Technical Summative One Project\public" /E /I /Y >nul
copy /Y "project.env" "Technical Summative One Project\.env" >nul
copy /Y "README.md" "Technical Summative One Project\README.md" >nul

cd /d "%~dp0Technical Summative One Project"
php spark migrate
if errorlevel 1 goto :failed
php spark db:seed TaskUserSeeder
if errorlevel 1 goto :failed

echo.
echo Setup complete. Keep this window open.
start "" "http://localhost:8080"
php spark serve
exit /b 0

:missing
echo PHP or Composer was not found.
echo Open this folder from the XAMPP Shell and try again.
pause
exit /b 1

:failed
echo Setup stopped because of the error above.
pause
exit /b 1
