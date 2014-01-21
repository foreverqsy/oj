while [ true ]
do
wget -N 10.16.5.5/acmer4.txt
mv /var/www/acmer4.txt /var/www/acmer1.txt
sleep 10

done

