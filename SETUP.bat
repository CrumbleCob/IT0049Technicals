@echo off
setlocal
title Module 3 Technical Setup
cd /d "%~dp0"

echo.
echo ========================================
echo   MODULE 3 TECHNICAL - ONE-TIME SETUP
echo ========================================
echo.

where php >nul 2>nul
if errorlevel 1 (
  echo PHP was not found. Start with XAMPP and add C:\xampp\php to PATH.
  pause
  exit /b 1
)

where composer >nul 2>nul
if errorlevel 1 (
  echo Composer was not found. Install it from https://getcomposer.org/
  pause
  exit /b 1
)

if not exist "_runtime\vendor\autoload.php" (
  echo [1/4] Downloading CodeIgniter...
  composer create-project codeigniter4/appstarter "_runtime" "^4.5" --no-interaction
  if errorlevel 1 goto :failed
) else (
  echo [1/4] CodeIgniter is already installed.
)

echo [2/4] Copying the project files...
xcopy "app" "_runtime\app\" /E /I /Y >nul
xcopy "public" "_runtime\public\" /E /I /Y >nul
copy /Y ".env.example" "_runtime\.env" >nul
if not exist "_runtime\public\uploads" mkdir "_runtime\public\uploads"

echo [3/4] Creating the M3Tech database...
if exist "C:\xampp\mysql\bin\mysql.exe" (
  "C:\xampp\mysql\bin\mysql.exe" -u root -e "CREATE DATABASE IF NOT EXISTS M3Tech CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
) else (
  mysql -u root -e "CREATE DATABASE IF NOT EXISTS M3Tech CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>nul
)

echo [4/4] Building tables and sample data...
pushd "_runtime"
php spark migrate --all
if errorlevel 1 (
  popd
  echo.
  echo Could not connect to MySQL. Create M3Tech in phpMyAdmin,
  echo import database\M3Tech.sql, then run SETUP.bat again.
  pause
  exit /b 1
)
php spark db:seed DemoSeeder
popd

echo.
echo Setup complete! Double-click START.bat.
pause
exit /b 0

:failed
echo.
echo Setup stopped. Check your internet connection and Composer installation.
pause
exit /b 1
