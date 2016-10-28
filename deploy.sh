#!/bin/bash

branch=${1:-master}
cd /var/www/html
git fetch --all
git checkout -b $branch
if ! git checkout $branch;
    then exit
fi
git pull origin $branch -f
composer update
php artisan cache:clear