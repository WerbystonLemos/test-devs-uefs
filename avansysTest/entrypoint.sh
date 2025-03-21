#!/bin/sh
set -e
echo "Aguardando Banco de Dados..."
while ! mysqladmin ping -h"$DB_HOST" --silent; do
    sleep 2
done
echo "Banco de Dados está pronto!"
if [ ! -f ".env" ]; then
    cp .env.example .env
fi
php artisan key:generate
php artisan migrate --force
php artisan migrate:fresh --seed
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
exec "$@"
