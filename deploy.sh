#!/bin/bash

if [[ "$1" != "" ]]; then
      branch='origin/master'
else
      branch="$1"
fi

cd /var/repo/dev.teedlee.ph
git fetch --all
git checkout $branch
composer update

#cd /var/www/html
#git fetch --all
#git reset --hard origin/master
#git pull origin master
#chown www-data:www-data ../html -R
#composer dumpautoload
#composer update
#php artisan cache:clear