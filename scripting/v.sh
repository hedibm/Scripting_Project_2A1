
#!/bin/bash
TMPFCMD="/tmp/cmd.tmp"

dialog --title 'Execute command' --menu 'Chose program to launch:' 0 0 0 \
l 'ls -la' \
p pwd \
t date \
h help \
d 'ldmi' \
w whoami 2> $TMPFCMD
CMD2RUN=$(cat $TMPFCMD)
if [ "$?" -eq "0" ]; then
 case "$CMD2RUN" in
  "l")
  ls -la
  command="ls -la"
  ;;
  "p")
  pwd
  command="pwd"
  ;;
  "t")
  date
  command="date"
  ;;
  "w")
  whoami
  command="whoami"
  ;;
 "h")
  help
  command="help"
  ;;
 "d")
   sudo dmidecode [OPTIONS]
  command="dmidecode [OPTIONS]"
  ;;
 esac
fi

echo $command

rm -f $TMPFCMD
