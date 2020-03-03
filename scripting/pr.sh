#!/bin/bash
# utilitymenu.sh - A sample shell script to display menus on screen
# Store menu options selected by the user
INPUT=/tmp/menu.sh.$$
# get text editor or fall back to vi_editor
vi_editor=${EDITOR-vi}

# trap and delete temp files
trap "rm $OUTPUT; rm $INPUT; exit" SIGHUP SIGINT SIGTERM
# Purpose - display output using msgbox 
#  $1 -> set msgbox height
#  $2 -> set msgbox width
#  $3 -> set msgbox title
#
function display_output(){
	local h=${1-10}			# box height default 10
	local w=${2-41} 		# box width default 41
	local t=${3-Output} 	# box title 
	dialog --backtitle "Linux Shell Script Tutorial" --title "${t}" --clear --msgbox "$(<$OUTPUT)" ${h} ${w}
}
function -lfree(){
	free

}

function -ldmi(){
	dmidecode [OPTIONS]
}

function -help(){
	help
}

while true
do

### display main menu ###
dialog --clear  --help-button --backtitle "Linux Shell Script Tutorial" \
--title "[ M A I N - M E N U ]" \
--menu "You can use the UP/DOWN arrow keys, the first \n\
letter of the choice as a hot key, or the \n\
number keys 1-9 to choose an option.\n\
Choose the TASK" 15 50 4 \
-lFree "Free" \
 -ldmi"dmidecode" \
-lhelp "help" \
Exit "Exit to the shell" 2>"${INPUT}"

menuitem=$(<"${INPUT}")


# make decsion 
case $menuitem in
	lFree) -lfree;;
	ldmi) -ldmi;;
	lhelp) -lhelp;;
	Exit) echo "Bye"; break;;
esac

done
# if temp files found, delete em
[ -f $INPUT ] && rm $INPUT

	
