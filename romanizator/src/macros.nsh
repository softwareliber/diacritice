!macro LoadLangLayout LangID
!define Index "Line${__LINE__}"
  StrCpy $8 "${LangID}" "" 2
#  StrCpy $8 "0000$8"
  System::Alloc ${NSIS_MAX_STRLEN}
  Pop $R0
  System::Call 'user32::GetKeyboardLayoutList(i ${NSIS_MAX_STRLEN}, i R0)i.r0'
  StrCpy $9 1
 
  loop-${Index}:
    System::Call '*$R0(i .r1)'
      IntFmt $2 "%08x" $1
      StrCpy $3 $2 "" -4
      StrCpy $4 "0x$3"
      IntOp $R0 $R0 + 4
    StrCmp $4 ${LangID} macro_end_${Index}
    StrCmp $9 $0 loop_end-${Index}
    IntOp $9 $9 + 1
    Goto loop-${Index}
 
  loop_end-${Index}:
    System::Call 'user32::LoadKeyboardLayoutA(t r8, i 1)i.r0'
 
  macro_end_${Index}:
    System::Call 'user32::ActivateKeyboardLayout(i ${LangID}, i 8)i.r0'
!undef Index
!macroend

!macro UnloadLangLayout LangID
!define Index "Line${__LINE__}"
  System::Call 'user32::UnloadKeyboardLayout(i ${LangID})i.r0'
  StrCmp $0 0 failed-${Index} end-${Index}

  failed-${Index}:
   System::Call 'user32::ActivateKeyboardLayout(i 1, i 8)i.r0'
   System::Call 'user32::UnloadKeyboardLayout(i ${LangID})i.r0'

  end-${Index}:
!undef Index
!macroend

!macro LoadRegFile regfile
  SetOutPath $TEMP
  File ${regfile}
  strcpy $0 "regedit /s $\"$TEMP\${regfile}$\""
  Exec $0
!macroend


#!insertmacro LoadLangLayout <your_layout_ID>
#!insertmacro UnloadLangLayout <your_layout_ID>
#!insertmacro LoadLangLayout 0x040c


Function VersionCompare
	!define VersionCompare `!insertmacro VersionCompareCall`
 
	!macro VersionCompareCall _VER1 _VER2 _RESULT
		Push `${_VER1}`
		Push `${_VER2}`
		Call VersionCompare
		Pop ${_RESULT}
	!macroend
 
	Exch $1
	Exch
	Exch $0
	Exch
	Push $2
	Push $3
	Push $4
	Push $5
	Push $6
	Push $7
 
	begin:
	StrCpy $2 -1
	IntOp $2 $2 + 1
	StrCpy $3 $0 1 $2
	StrCmp $3 '' +2
	StrCmp $3 '.' 0 -3
	StrCpy $4 $0 $2
	IntOp $2 $2 + 1
	StrCpy $0 $0 '' $2
 
	StrCpy $2 -1
	IntOp $2 $2 + 1
	StrCpy $3 $1 1 $2
	StrCmp $3 '' +2
	StrCmp $3 '.' 0 -3
	StrCpy $5 $1 $2
	IntOp $2 $2 + 1
	StrCpy $1 $1 '' $2
 
	StrCmp $4$5 '' equal
 
	StrCpy $6 -1
	IntOp $6 $6 + 1
	StrCpy $3 $4 1 $6
	StrCmp $3 '0' -2
	StrCmp $3 '' 0 +2
	StrCpy $4 0
 
	StrCpy $7 -1
	IntOp $7 $7 + 1
	StrCpy $3 $5 1 $7
	StrCmp $3 '0' -2
	StrCmp $3 '' 0 +2
	StrCpy $5 0
 
	StrCmp $4 0 0 +2
	StrCmp $5 0 begin newer2
	StrCmp $5 0 newer1
	IntCmp $6 $7 0 newer1 newer2
 
	StrCpy $4 '1$4'
	StrCpy $5 '1$5'
	IntCmp $4 $5 begin newer2 newer1
 
	equal:
	StrCpy $0 0
	goto end
	newer1:
	StrCpy $0 1
	goto end
	newer2:
	StrCpy $0 2
 
	end:
	Pop $7
	Pop $6
	Pop $5
	Pop $4
	Pop $3
	Pop $2
	Pop $1
	Exch $0
FunctionEnd