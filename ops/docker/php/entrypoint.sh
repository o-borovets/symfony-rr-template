#!/usr/bin/env sh
set -e

if [ "$1" = 'php' ] || [ "$1" = 'bin/console' ] || [ "$1" = 'rr' ];  then

  if [ "$APP_ENV" != "prod" ]; then
    export PHP_OPCACHE_VALIDATE_TIMESTAMPS=1
  fi

  if [ "$APP_ENV" != 'prod' ]; then
    composer install --prefer-dist --no-progress --no-interaction
  fi

  setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX var
  setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX var
fi

exec docker-php-entrypoint "$@"
