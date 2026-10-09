@echo off
setlocal
title Midterm Project POS Setup
cd /d "%~dp0"

echo.
echo ========================================
echo    MIDTERM PROJECT POS - SETUP
echo ========================================
echo.

where php >nul 2>nul
if errorlevel 1 (
  echo PHP was not found. Add C:\xampp\php to PATH, then try again.
  pause
  exit /b 1
)

where composer >nul 2>nul
if errorlevel 1 (
  echo Composer was not found. Install Composer, then try again.
  pause
  exit /b 1
)

if not exist "_runtime\vendor\autoload.php" (
  echo [1/4] Downloading CodeIgniter 4...
  composer create-project codeigniter4/appstarter "_runtime" "4.7.4" --no-interaction
  if errorlevel 1 goto :failed
) else (
  echo [1/4] CodeIgniter is already installed.
)

echo [2/4] Copying the POS files...
robocopy "app" "_runtime\app" /E /NFL /NDL /NJH /NJS /NP >nul
if errorlevel 8 goto :failed
robocopy "public" "_runtime\public" /E /NFL /NDL /NJH /NJS /NP >nul
if errorlevel 8 goto :failed
copy /Y ".env.example" "_runtime\.env" >nul
if not exist "_runtime\app\Controllers\Sales.php" goto :failed

echo [3/4] Creating the MidtermPOS database...
if exist "C:\xampp\mysql\bin\mysql.exe" (
  "C:\xampp\mysql\bin\mysql.exe" -u root -e "CREATE DATABASE IF NOT EXISTS MidtermPOS CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
) else (
  mysql -u root -e "CREATE DATABASE IF NOT EXISTS MidtermPOS CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>nul
)

echo [4/4] Building tables and sample data...
pushd "_runtime"
php spark migrate --all
if errorlevel 1 (
  popd
  echo.
  echo Could not connect to MySQL. Create MidtermPOS in phpMyAdmin,
  echo import database\MidtermPOS.sql, then run SETUP.bat again.
  pause
  exit /b 1
)
php spark db:seed MidtermSeeder
popd

echo.
echo Setup complete! Double-click START.bat.
pause
exit /b 0

:failed
echo.
echo Setup stopped. Check PHP, Composer, internet, and MySQL.
pause
exit /b 1
