#!/bin/sh
set -e
echo "Aguardando Banco de Dados..."
while ! mysqladmin ping -h"$DB_HOST" --silent; do
    sleep 2
done
echo "Banco de Dados está pronto!"
if [ ! -d "vendor" ]; then
    echo "Instalando dependências do Composer..."
    composer install --no-dev --optimize-autoloader
fi
if [ ! -f ".env" ]; then
    cp .env.example .env
fi
php artisan key:generate
php artisan migrate --force && php artisan db:seed --force
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
exec "$@"
