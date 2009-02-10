;NSIS Modern User Interface
;Written by Sorin Sbarnea - LGPL/GPL/MPL License
;SetCompress off
;--------------------------------
;Include Modern UI


!include "MUI2.nsh"
;  !include "FontReg.nsh"
!include "FileFunc.nsh"
!include "FontRegAdv.nsh"
!include FontName.nsh
!include src\macros.nsh
!include Sections.nsh
!include "src\registerExtensions.nsh"

;--------------------------------
;General

  ;Name and file
	!define VERSION 0.3
;  VIAddVersionKey "FileVersion" ${VERSION}

	!define NAME Romanizator
  RequestExecutionLevel admin
  Icon src\ro.ico
  UninstallIcon src\ro.ico
  Name "${NAME}"
  OutFile "romanizator.exe"
  BrandingText "${NAME} ${VERSION}"
  ;Default installation folder
  InstallDir "$LOCALAPPDATA\Modern UI Test"
  
  ;Get installation folder from registry if available
  InstallDirRegKey HKCU "Software\Modern UI Test" ""

  ;Request application privileges for Windows Vista
  RequestExecutionLevel admin

;--------------------------------
;Interface Settings
 !define MUI_HEADERIMAGE
 !define MUI_HEADERIMAGE_BITMAP "src\header.bmp" ; optional

#  !define MUI_ABORTWARNING
!define MUI_COMPONENTSPAGE_NODESC
!define MUI_INSTFILESPAGE_COLORS "FFFFFF 000000" ;Two colors
!define MUI_FINISHPAGE_NOAUTOCLOSE


;--------------------------------
;Pages
   !define  MUI_ICON "src\nusunteu.ico"
   !define MUI_UNICON "src\nusunteu.ico"
   
  !insertmacro MUI_PAGE_LICENSE "src\License.txt"
  !insertmacro MUI_PAGE_COMPONENTS 
;  !insertmacro MUI_PAGE_DIRECTORY
  !insertmacro MUI_PAGE_INSTFILES
  !insertmacro MUI_PAGE_FINISH
  
;	!insertmacro MUI_UNPAGE_FINISH  

  !insertmacro MUI_UNPAGE_CONFIRM
  !insertmacro MUI_UNPAGE_INSTFILES
  
;--------------------------------
;Languages
 
;  !insertmacro MUI_LANGUAGE "English"
  !insertmacro MUI_LANGUAGE "Romanian"

  SetOverwrite try
  ShowInstDetails show
;--------------------------------
;Installer Sections


SubSection "Fonturi"

Section /o "Windows XP Font Update pack (manual)" section_euupdate
; 15.11.2006 TIMES.TTF
;\Fonts\TIMES.TTF
  ExecShell "" "iexplore.exe" "http://www.microsoft.com/downloads/details.aspx?familyid=0EC6F335-C3DE-44C5-A13D-A1E7CEA5DDEA&displaylang=ro"
;  ExecWait 'start http://www.microsoft.com/downloads/details.aspx?familyid=0EC6F335-C3DE-44C5-A13D-A1E7CEA5DDEA&displaylang=en'
SectionEnd

Section "DejaVu Fonts" section_dejavu
  !insertmacro InstallTTF 'dejavu\\DejaVuSans-Bold.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSans-BoldOblique.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSans-ExtraLight.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSans-Oblique.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSans.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSansCondensed-Bold.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSansCondensed-BoldOblique.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSansCondensed-Oblique.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSansCondensed.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSansMono-Bold.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSansMono-BoldOblique.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSansMono-Oblique.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSansMono.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSerif-Bold.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSerif-BoldItalic.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSerif-Italic.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSerif.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSerifCondensed-Bold.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSerifCondensed-BoldItalic.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSerifCondensed-Italic.ttf'
  !insertmacro InstallTTF 'dejavu\\DejaVuSerifCondensed.ttf'
  SendMessage ${HWND_BROADCAST} ${WM_FONTCHANGE} 0 0 /TIMEOUT=5000
  ;LogText "Setting DejaVu as default console font in applications"
  !insertmacro LoadRegFile "reg\dejavu.reg"
SectionEnd

SubSectionEnd

Section "Romanian Keyboard (Standard SR 13392:2004)" section_kbro
  SetOutPath "$TEMP\kb"
  File /a /r "kb\xp-x86\*"

# windows does show a restart window anyway, even we set 128 so wi use autoit
  Exec 'autoit3.exe kbdro.au3'
  ExecWait 'rundll32.exe setupapi,InstallHinfSection DefaultInstall 128 $TEMP\kb\kbdro_xp.inf'
# 00020418 - Romanian (Programmers)
# 00010418 - Romanian (Standard)
  !insertmacro LoadLangLayout 0x00010418
  !insertmacro LoadRegFile "reg\keyboard.reg"

SectionEnd

SubSection "Corectoare ortografice" 


Section /o "OpenOffice.org Romanian Dictionary Extension (online)" section_ooo
  SetOutPath "$TEMP"

          ooodownload:
          NSISdl::download "http://www.i18n.ro/download/ooo/dictionaries-ro.oxt" "$TEMP\dictionaries-ro.oxt"
            Pop $0
            StrCmp $0 "success" oooinstall
            DetailPrint "Nu am putut descarca extensia OOo ($0)"
            MessageBox MB_ABORTRETRYIGNORE|MB_ICONEXCLAMATION $(LANG_MDAC_DOWNLOAD_ERR) IDRETRY ooodownload IDIGNORE oooinstall
            Abort $(LANG_INSTALL_CANCELED)
          oooinstall:
        ;      File /a /r "ooo\dictionaries-ro.oxt"
 
;  ExecWait 'start /D\"$TEMP\" dictionaries-ro.oxt'
						   ExecShell "" "$TEMP\dictionaries-ro.oxt"
SectionEnd

;Section /o "Mozilla Romanian Dictionary Extension" section_mozilla
;SectionEnd

SubSectionEnd

Section "General" section_general
  ;LogText "General registry settings"
  !insertmacro LoadRegFile "reg\general.reg"
  ;LogText "Setting default encodings to UTF-8"
  !insertmacro LoadRegFile "reg\encodings.reg"
SectionEnd

#Section "7-Zip"
#  SetOutPath "$TEMP\7z"
#  File /a /r "aspell\*"
#  ExecWait '"$TEMP\7z\unattended.cmd" '
#SectionEnd

;--------------------------------
;Descriptions

  ;Language strings

  ;Assign language strings to sections
  !insertmacro MUI_FUNCTION_DESCRIPTION_BEGIN
    ;!insertmacro MUI_DESCRIPTION_TEXT ${SecDummy} $(DESC_SecDummy)
;  !insertmacro  MUI_FINISHPAGE_TEXT "Trebuie sa va autentificati din nou pentru ca schimbarile sa fie aplicate."
  !insertmacro MUI_FUNCTION_DESCRIPTION_END

;--------------------------------
;Uninstaller Section

;Section "Uninstall"
;  Delete "$INSTDIR\Uninstall.exe"
;  RMDir "$INSTDIR"
;  DeleteRegKey /ifempty HKCU "Software\Modern UI Test"
;SectionEnd


Function .onInit


; --- euupdate - check if needed
	!define stSTAT '(&t24,i,i,i) i'

   System::Call '*${stSTAT} .r0' // allocates memory and writes pointer to $0
   System::Call 'msvcrt.dll::_stat(t "$WINDIR\Fonts\Arial.ttf", i r0) i .r1'
;   MessageBox MB_OK "_stat returned $1"
;   IntCmp $1 -1 myexit
   System::Call "*$0${stSTAT}(, .r2, .r3, .r4)"
;   MessageBox MB_OK "st_atime=$2, st_mtime=$3, st_ctime=$4"
;  Convert a time value to a string 
;   System::Call 'msvcrt.dll::ctime(*i r2) t .r5'
;   System::Call 'msvcrt.dll::ctime(*i r3) t .r6'
;   System::Call 'msvcrt.dll::ctime(*i r4) t .r7'
;   MessageBox MB_OK "st_atime=$5$\nst_mtime=$6$\nst_ctime=$7"

   IntCmpU $3 1163581346 we_dont_need_euupdate 0 we_dont_need_euupdate ; exit if equal or greater
; now we neeed euupdate.exe
   !insertmacro SelectSection ${section_euupdate}
;  New Arial.ttf had st_mtime = 1163581346;
	 goto myexit
we_dont_need_euupdate:
   !insertmacro UnselectSection ${section_euupdate}
   SectionSetFlags ${section_euupdate}  ${SF_RO}
myexit:
   System::Free $0 // free allocated memory


  
  !insertmacro UnselectSection ${section_dejavu}
  IfFileExists "$WINDIR\Fonts\DejaVuSansMono.ttf" skip_dejavu 0
  !insertmacro SelectSection ${section_dejavu}
skip_dejavu: 

	!insertmacro UnselectSection ${section_kbro}


  GetVersion::WindowsVersion
  Pop $R0
;  MessageBox MB_OK "WindowsVersion: $R0"
  ${VersionCompare} $R0 "6.0" $R1
  IntCmp $R1 2 0 skip_kbro 
  ; we have and old windows (<6.0), so we have to check if we have the keyboard files

  IfFileExists "$SYSDIR\kbdro1.dll" skip_kbro 0
  MessageBox MB_OK "notepad is installed"
  !insertmacro SelectSection ${section_kbro}
  goto after_kbro
skip_kbro: 
 SectionSetFlags ${section_kbro}  ${SF_RO}  
  !insertmacro UnselectSection ${section_kbro}
after_kbro:


; --- check if OOo is installed
  ReadRegStr $1 HKCR ".oxt" ""  ; read default key, it should exist
  IfErrors 0 skip_ooo
    SectionSetFlags ${section_ooo}  ${SF_RO}  
 
  ClearErrors
  goto end_ooo
skip_ooo:
end_ooo:

  
FunctionEnd
