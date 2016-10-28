#!/bin/bash

if [[ "$1" != "" ]]; then
      branch='master'
else
      branch="$1"
fi

cd /var/www/teedlee
git fetch --all
if ! git checkout "$branch";
    then exit
fi
git pull origin "$branch" -f
composer update
php artisan cache:clear