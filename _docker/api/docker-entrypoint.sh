#!/bin/sh

APP_UID=${APP_UID:-1000}

if [[ -z "$APP_UID" ]]
then
    >&2 echo "You must set the app user id"
    exit 1
fi

adduser app -s /bin/sh -h /home/app -u "$APP_UID" -D

echo "Warmup cache"
su -c "php /var/www/bin/console cache:clear -n" app

# Composer install (only if not in prod env)
echo "Installing dependencies ..."
su -c "composer install " app

su -c "php /var/www/bin/console doctrine:database:create --if-not-exists -n -vv" app
su -c "php /var/www/bin/console doctrine:migrations:migrate -n -vv" app

"$@"
