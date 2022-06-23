# presence-cf2m
Application web de relevé des présences stagiaires avec statistiques

## Arborescence

- [La configuration des serveurs de dev](https://github.com/mikhawa/presence-cf2m#la-configuration-des-serveurs-de-dev) - à voir
- [La configuration locale](https://github.com/mikhawa/presence-cf2m#la-configuration-locale) - à faire
- [Installation de Symfony](https://github.com/mikhawa/presence-cf2m#installation-de-symfony) - à faire
- [Démarrage du serveur](https://github.com/mikhawa/presence-cf2m#d%C3%A9marrage-du-serveur) - à faire
- [Création du contrôleur général](https://github.com/mikhawa/presence-cf2m#cr%C3%A9ation-du-contr%C3%B4leur-g%C3%A9n%C3%A9ral) - à titre informatif
- [Mise en place d'un template gratuit](https://github.com/mikhawa/presence-cf2m#mise-en-place-dun-template-gratuit) - à voir et discuter
- [Transformation du modèle en Twig](https://github.com/mikhawa/presence-cf2m#transformation-du-mod%C3%A8le-en-twig) - à titre informatif


### Prérequis

#### La configuration des serveurs de dev

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Nous allons partir de la configuration de notre server de dev sur notre hébergeur.

- PHP 8.1.7
- SSL , https
- Calendar activé : https://www.php.net/manual/fr/book.calendar.php
- GMP activé : https://www.php.net/manual/fr/book.gmp.php
- Toutes les erreurs activées

#### Configuration serveur sur l'hébergeur :

##### APACHE - PHP

![Configuration serveur de dev](https://github.com/mikhawa/presence-cf2m/raw/main/datas/img/screenshot-2022.06.22-10_02_36.png "FR")

#### MariaDB

10.3.34-MariaDB-1:10.3.34

### La configuration locale

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Sous Windows, d'abord installer la dernière version de WAMP (sauf si vous l'utilisez déjà ou une version proche) sur le site :

https://wampserver.aviatechno.net/

- wampserver3.2.6_x64.exe

Puis chargez et installez la mise à jour (sur la 3.2.6 ou proche) 3.2.9 :

- wampserver3_x86_x64_update3.2.9.exe

Installez ensuite Apache 2.4.54

- wampserver3_x64_addon_apache2.4.54.exe

Installez ensuite PHP 8.1.7

- wampserver3_x64_addon_php8.1.7.exe

Puis la bonne version de MariaDB 10.3.35

- wampserver3_x64_addon_mariadb10.3.35.exe

Puis la bonne version de PHPMyAdmin 5.2.0

- wampserver3_x86_x64_phpmyadmin5.2.0.exe

#### Seul MySQL ne fonctionne pas

Nous ne l'utilisons pas sur notre serveur dev ni prod

**! N'oubliez pas de rajouter PHP 8.1.7 dans vos variables d'environment !**

### Installation de Symfony

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Dans la console :

        php -v
        # donne 8.1.7
        composer selfupdate
        # met à jour (2.3.7 à ce jour)
        composer install
        # installe les dépendances
        npm -v
        # donne 8.10.0
        npm update -g npm
        # on met à jour
        node -v
        # donne 16.15.1

Si autre version de node, téléchargez `nvm` : https://github.com/coreybutler/nvm-windows/releases

        nvm ls
        nvm on

Node.js devrait être à jour

        yarn
        npm run build
        # construction du public



### Démarrage du serveur

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Installez le certificat openSSL (https):

    symfony server:ca:install

Démarrage du projet:

    symfony serve -d

Vous pouvez y accéder à l'URL indiquée, généralement du type :

https://127.0.0.1:8000/

        
### Création du contrôleur général

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

        php bin/console make:controller

Création de `src/Controller/PublicController.php` et de `templates/public/index.html.twig`

### Mise en place d'un template gratuit

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Mise en place d'un template d'administration gratuit à transformer en modèle Twig. Emplacement du modèle compressé :

    datas/templates/free-startbootstrap-sb-admin-gh-pages.zip

On peut le tester à cette URL :

https://startbootstrap.com/template/sb-admin

### Transformation du modèle en Twig

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

