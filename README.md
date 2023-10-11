# Mise en prod du 31/08/2023
1. Mettre tout les fichiers de oza sur le serveur
2. Faire attention à renommer le dossier qui est au chemin suivant : ressources/views/admin/Item => le dossier "Item" est à renommer en "item" (majuscule vers minuscule)

# IMPORTANT
Si vous rencontrez le moindre problème lors de la procédure d'installation qui va suivre, merci de nous contacter.

Vous devez être à la racine du projet quand vous exécuterez les commandes de ce guide.

## Procédure d'installation laravel (pas à pas)

1. Installer les dépendances requises à laravel.

```shell
composer install
```

2. Créer une base de données avec l'interclassement "utf8_general_ci".
3. Renommer le fichier à la racine `.env.example` en `.env`
4. Mettre à jour le ".env" 

```env
DB_CONNECTION=mysql  <= à changer
DB_HOST=127.0.0.1  <- à changer
DB_PORT=3306  <- à changer
DB_DATABASE=oza  <- à changer
DB_USERNAME=root  <- à changer
DB_PASSWORD=root  <- à changer
```

4. Exécuter la commande suivante

```shell
php artisan key:generate
```

5. Exécuter la commande suivante qui va remplir la base de données avec des données de départ.

```shell
php artisan migrate --seed
```

6. Exécuter la commande suivante

```shell
php artisan storage:link
```

7. Configurer le recaptcha, pour cela vous devez [créer des clés recaptcha](https://developers.google.com/recaptcha/intro?hl=fr), puis venir les ajouter dans le ".env".

```
RECAPTCHA_SITE_KEY=  <- ajouter la clé ici
RECAPTCHA_SECRET_KEY=  <- ajouter la clé secret ici
```

8. Configurer le serveur mail, puis venir ajouter les informations du serveur mail dans le ".env".
```
MAIL_MAILER=  <- à changer
MAIL_HOST=  <- à changer
MAIL_PORT=  <- à changer
MAIL_USERNAME=  <- à changer
MAIL_PASSWORD=  <- à changer
MAIL_ENCRYPTION=  <- à changer
MAIL_FROM_ADDRESS=  <- à changer
MAIL_FROM_NAME=  <- à changer
```


## Version
PHP : 7.4
Laravel : 8
