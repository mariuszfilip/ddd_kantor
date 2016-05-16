echo "error" > www/result.html
date > www/date.txt
php vendor/behat/behat/bin/behat --format html
cat www/result.html

