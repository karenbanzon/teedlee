#!/bin/bash

if [[ "$1" != "" ]]; then
      branch='master'
else
      branch="$1"
fi

cd /var/www/html
git fetch --all
git checkout $branch
git pull origin $branch -f
composer update
php artisan cache:clear