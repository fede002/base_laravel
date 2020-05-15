Set-Location D:\recetasBasa_PROD
composer install --no-dev
php artisan config:clear
php artisan cache:clear
php artisan storage:link
