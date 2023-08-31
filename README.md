# Mise en prod du 31/08/2023
Mettre tout les fichiers de oza sur le serveur, et fait attention car il faut renommer le dossier qui est au chemin suivant : ressources/views/admin/Item le dossier "Item" est a renommer en "item"

# IMPORTANT
Si vous rencontrez le moindre problème lors du guide d'installation qui va suivre
nous ne pourrons pas vous aider.

Vous devez être à la racine du projet quand vous exécuteriez les commandes de ce guide.

## Procédure d'installation laravel (pas à pas)

1. Vous devez installer les dépendances requises à laravel.
```shell
composer install
```
2. Vous devez maintenant crée une base de données avec l'interclassement "utf8_general_ci".
3. Vous devez mettre à jour le ".env" qui est le fichier de configuration laravel
   (Le fichier ".env" se trouve à la racine du projet)
```
DB_CONNECTION=mysql  <= à changer
DB_HOST=127.0.0.1  <- à changer
DB_PORT=3306  <- à changer
DB_DATABASE=oza  <- à changer
DB_USERNAME=root  <- à changer
DB_PASSWORD=root  <- à changer
```
4. Vous devez exécuter la commande suivante qui est nécessaire au fonctionnement de laravel.
````shell
php artisan key:generate
````
5. Vous devez exécuter la commande suivante qui vas remplir la base de données avec des données de départ.
````shell
php artisan migrate --seed
````
6. Vous devez exécuter la commande suivante qui est nécessaire au fonctionnement de laravel.
````shell
php artisan storage:link
````
7. Vous devez configurer le recaptcha, pour cela vous devez créer des clés recaptcha, puis venir les ajouter dans le ".env".
````
RECAPTCHA_SITE_KEY=  <- ajouter la clé ici
RECAPTCHA_SECRET_KEY=  <- ajouter la clé secret ici
````
8. Vous devez ensuite configurer le serveur mail, puis venir ajouter les informations du serveur mail dans le ".env".
````
MAIL_MAILER=  <- à changer
MAIL_HOST=  <- à changer
MAIL_PORT=  <- à changer
MAIL_USERNAME=  <- à changer
MAIL_PASSWORD=  <- à changer
MAIL_ENCRYPTION=  <- à changer
MAIL_FROM_ADDRESS=  <- à changer
MAIL_FROM_NAME=  <- à changer
````
IMPORTANT, si vous ne savez pas comment faire pour le point 8, nous ne pouvons rien faire,
vous êtes un hébergeur web, vous posséder forcément un serveur mail, demander à vos supérieurs en cas de problème.

## Version
PHP : 7.4
Laravel : 8
