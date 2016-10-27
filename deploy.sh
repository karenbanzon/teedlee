#!/bin/bash

if [[ "$1" != "" ]]; then
      branch='origin/master'
else
      branch="$1"
fi

cd /var/www/html
git fetch --all
git checkout $branch
git reset --hard $branch
composer update