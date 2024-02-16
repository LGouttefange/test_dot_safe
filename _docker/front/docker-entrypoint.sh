#!/bin/sh

APP_UID=${APP_UID:-1000}

if [[ -z "$APP_UID" ]]
then
    >&2 echo "You must set the app user id"
    exit 1
fi

usermod -u $APP_UID node
chmod 777 /var/www

su -c "npm install" node
su -c "$@" node
