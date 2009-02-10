Section "GNU Aspell" section_aspell
  SetOutPath "$TEMP\aspell"
  File /a /r "aspell\*"
  ExecWait '"$TEMP\aspell\aspell-0.60.3.exe" /S '
skip:
SectionEnd

Section "GNU Aspell - Romanian dictionary addon" section_aspellro
  SetOutPath "$PROGRAMFILES\Aspell\lib\aspell-0.60\"
  File /a /r "aspell\dics\*.*"
SectionEnd




  !insertmacro UnselectSection ${section_aspell}
  ReadRegDWORD $0 HKLM "Software\Aspell" "AspellVersion"
  IntCmp $0 15 skip_aspell 0 skip_aspell
  !insertmacro SelectSection ${section_aspell}
skip_aspell:

	!insertmacro UnselectSection ${section_aspellro}
  IfFileExists "$PROGRAMFILES\Aspell\lib\aspell-0.60\ro.dat" skip_aspellro 0
  !insertmacro SelectSection ${section_aspellro}
skip_aspellro:

