@echo off


IF ERRORLEVEL 2 GOTO ERROR

xcopy C:\xampp\htdocs\titanApp "C:\Users\JhohanSilva\appNativa\www" /E /I /Y /exclude:exclusion.txt
echo Proceso Completado

cd "C:\Users\JhohanSilva\appNativa"
cordova run android

pause
exit

:ERROR
pause