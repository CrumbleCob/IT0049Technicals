@echo off
setlocal

set "SOURCE=%~dp0project-files"
set "TARGET=%~dp0..\basic-pos-system"

where composer >nul 2>nul || (
    echo Composer is not available. Install Composer first.
    pause
    exit /b 1
)

if exist "%TARGET%" (
    echo The folder already exists:
    echo %TARGET%
    echo Rename that folder or remove it before trying again.
    pause
    exit /b 1
)

echo Creating the CodeIgniter project...
call composer create-project codeigniter4/appstarter "%TARGET%" --no-interaction
if errorlevel 1 (
    echo CodeIgniter installation failed.
    pause
    exit /b 1
)

echo Adding the four-page POS website...
robocopy "%SOURCE%" "%TARGET%" /E >nul
if errorlevel 8 (
    echo The POS files could not be copied.
    pause
    exit /b 1
)

copy /Y "%TARGET%\.env.example" "%TARGET%\.env" >nul

echo.
echo Project created successfully at:
echo %TARGET%
echo.
echo Starting the website at http://localhost:8080/
echo Keep this window open while using the website.
cd /d "%TARGET%"
start "" http://localhost:8080/
C:\xampp\php\php.exe spark serve

