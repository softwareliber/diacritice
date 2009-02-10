@echo off
pskill -t romanizator.exe 2>nul
del romanizator.exe >nul
"C:\Program Files\NSIS\makensis.exe" /V2 romanizator.nsi
