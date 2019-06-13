@echo off


IF ERRORLEVEL 2 GOTO ERROR

xcopy C:\xampp\htdocs\devApp "C:\Users\Jhohan\appOnsen\www" /E /I /Y /exclude:exclusion.txt
echo Proceso Completado

cd "C:\Users\Jhohan\appOnsen"
cordova run android

pause
exit

:ERROR
pause