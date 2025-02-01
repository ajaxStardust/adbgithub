clear 
wsl_workspace="/var/www/wsldebian/wsl_workspace"
echo "using \$wsl_workspace for test dir: " $wsl_workspace
sleep 3
echo " "
sleep 3
echo "#"
sleep 3 
echo ".bashrc var \$ht: " $ht &&
sleep 3
echo 'cd $ht && echo $PWD' $PWD && 
sleep 4
clear
cd $ht && echo $PWD && 
sleep 3  
clear 
echo 'cd $ht: ' $ht 
sleep 3
cd $ht 
sleep 3
echo "Return to " $OLDPWD  'with $OLDPWD var'
sleep 4
echo 'executing /mnt/c/Portable/Waterfox/waterfox.exe http://wsldebian/wsl_workspace/?path2url='$OLDPWD
/mnt/c/Portable/Waterfox/waterfox.exe http://wsldebian/wsl_workspace/?path2url="$OLDPWD" &
sleep 5
clear
echo 'transform ./index.php'
eval "transform ./index.php"
exit 

