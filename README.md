# Info

php : 7.4

composer install
cp .env.example .env
php artisan key:generate

setup database (.env)

php artisna migrate --seed
php artisan storage:link



<!-- ### .ENV
RECAPTCHA_SITE_KEY=
RECAPTCHA_SECRET_KEY= -->