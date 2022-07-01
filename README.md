# Info

php : 7.4

composer install
cp .env.example .env
php artisan key:generate

setup database (.env)

php artisna migrate --seed
php artisan storage:link



## Renseigner une clé recaptcha (.env)
RECAPTCHA_SITE_KEY=
RECAPTCHA_SECRET_KEY=

## Renseigner un mail de récupération (.env)
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=
