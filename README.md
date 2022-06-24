# presence-cf2m
Application web de relevé des présences stagiaires avec statistiques

## Arborescence

- [La configuration des serveurs de dev](https://github.com/mikhawa/presence-cf2m#la-configuration-des-serveurs-de-dev) - **à faire**
- [La configuration locale](https://github.com/mikhawa/presence-cf2m#la-configuration-locale) - **à faire**
- [Installation de Symfony](https://github.com/mikhawa/presence-cf2m#installation-de-symfony) - **à faire**
- [Démarrage du serveur](https://github.com/mikhawa/presence-cf2m#d%C3%A9marrage-du-serveur) - **à faire**
- [Création du contrôleur général](https://github.com/mikhawa/presence-cf2m#cr%C3%A9ation-du-contr%C3%B4leur-g%C3%A9n%C3%A9ral) - à titre formatif / informatif
- [Mise en place d'un template gratuit](https://github.com/mikhawa/presence-cf2m#mise-en-place-dun-template-gratuit) - à voir et discuter
- [Transformation du modèle en Twig](https://github.com/mikhawa/presence-cf2m#transformation-du-mod%C3%A8le-en-twig) - à titre formatif / informatif
- [Création d'un utilisateur](https://github.com/mikhawa/presence-cf2m#cr%C3%A9ation-dun-utilisateur) - à titre formatif / informatif
- [Compléter l'entité User](https://github.com/mikhawa/presence-cf2m#compl%C3%A9ter-lentit%C3%A9-user) - à titre formatif / informatif
- [Création du fichier .env.local](https://github.com/mikhawa/presence-cf2m#compl%C3%A9ter-lentit%C3%A9-user) - **à faire**


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

S'il vous manque des gestionnaires de paquets vous pouvez les trouver ici :

- https://getcomposer.org/download/
- https://nodejs.org/en/download/
- https://github.com/nvm-sh/nvm
- https://yarnpkg.com/getting-started/install


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
        # on met à jour : donne 8.13.1
        node -v
        # donne 16.15.1
        # au 23/06/2022

Si autre version de node, téléchargez `nvm` : https://github.com/coreybutler/nvm-windows/releases

        nvm ls
        nvm on

Node.js devrait être à jour

#### Important, doit pouvoir installer `webpack-encore` :

        npm run build
        # construction du public

Pour installer `yarn` si vous le souhaitez (un autre gestionnaire JS de package) :

    npm i -g corepack
    yarn


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

Création de `templates/template.sbadmin.html.twig`

Ajout des JS et CSS dans les `assets`

Modification de

    assets/app.js
    ...
    import './styles/app.css';
    import './styles/styles.css';
    
    // start the Stimulus application
    import './bootstrap';
    import './scripts';
    import './datatables-simple-demo';

Puis création des assets pour le dossier `public`

    npm run build

Les dépendances front-end sont mises dans le dossier caché sur github `public/build` et chargées par `templates/base.html.twig`

Pour le moment, seul la page d'accueil a été mise en page (notre connexion) :

    templates/public/homepage.html.twig

[Voir les modifications et fichiers créés à cette étape - commit](https://github.com/mikhawa/presence-cf2m/commit/50ac472a37fefde48dfa44f69e6a1bbe518782c7)

### Création d'un utilisateur

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Création de notre première entité, un utilisateur:

    php bin/console make:user

Avec `User` comme nom, stocké dans la DB avec le `username` comme champs de référence et la gestion des passwords : 

Fichiers créés/modifiés :

    src/Entity/User.php
    src/Repository/UserRepository.php
    config/packages/security.yaml

[Voir les modifications et fichiers créés à cette étape - commit](https://github.com/mikhawa/presence-cf2m/commit/4cd38e097754f10a28ac296c7aadce64daa5e8e7)

### Compléter l'entité User

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

On rajoute les champs nécessaires à l'entité `User` avec :

    php bin/console make:entity User

Ce sont des valeurs par défaut, on va pouvoir les adapter suivant nos besoins.

[Voir les modifications et fichiers créés à cette étape - commit](https://github.com/mikhawa/presence-cf2m/commit/a6a8ff00740400d26189e8055b78a9ce65d5370e)

### Création du fichier .env.local

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Pour pouvoir stocker