# presence-cf2m
Application web de relevé des présences stagiaires avec statistiques

### Mise en place du projet

Les **à faire** sont les étapes à faire et vérifier, 

Les **à titre formatif / informatif** sont à regarder si vous le souhaitez, mais sont déjà exécutées dans le code de ce répertoire.

Les **à voir et discuter** sont des points que l'on pourrait modifier dans la structure.

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
- [Création du fichier .env.local](https://github.com/mikhawa/presence-cf2m#cr%C3%A9ation-du-fichier-envlocal) - **à faire**
- [Création de la DB locale](https://github.com/mikhawa/presence-cf2m#cr%C3%A9ation-de-la-db-locale) - **à faire**
- [Première migration](https://github.com/mikhawa/presence-cf2m#premi%C3%A8re-migration) - **à faire**
- [Amélioration de l'entité User](https://github.com/mikhawa/presence-cf2m#am%C3%A9lioration-de-lentit%C3%A9-user) - à titre formatif / informatif
- [Création d'une authentification](https://github.com/mikhawa/presence-cf2m#cr%C3%A9ation-dune-authentification) - à titre formatif / informatif
- [Insertion d'un utilisateur dans la DB](https://github.com/mikhawa/presence-cf2m#insertion-dun-utilisateur-dans-la-db) - **à faire**
- [Activation du remember me](https://github.com/mikhawa/presence-cf2m#activation-du-remember-me) - à titre formatif / informatif
- [Répartition du travail](https://github.com/mikhawa/presence-cf2m#r%C3%A9partition-du-travail) - **À FAIRE**



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

Pour pouvoir stocker nos variables sensibles sans les mettre sur github, dupliquez `.env` sous le nom `.env.local`.

C'est là que vous pourrez passer du mode `dev` à `test` ou `prod`

    .env.local
    ...
    APP_ENV=dev
    ...

C'est également dans ce fichier qu'on va mettre le lien vers notre base de donnée, comme nous travaillons en local pour le moment, vous pouvez commenter / dé-commenter ces lignes et changer les valeurs vers votre serveur MariaDB :

    .env.local
    ...
    # DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
    DATABASE_URL="mysql://root:@127.0.0.1:3306/presencescf2m?charset=utf8mb4"
    ...

Vérifiez bien d'avoir lancé Wamp et que le port corresponde bien avec celui indiqué (ou changez-le dans le `.env.local`, chez moi, c'est le 3306)

### Création de la DB locale

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Dans la console :

    php bin/console doctrine:database:create

Vous pouvez maintenant vérifier si votre base de donnée est créée sur PHPMyAdmin

### Première migration

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Dans la console :

    php bin/console make:migration

Un fichier .php sera créé dans le dossier `migrations`, on peut modifier les requêtes SQL avant d'effectuer la migration, mais pour le moment, exécutons la telle quelle.

    php bin/console doctrine:migrations:migrate

Doctrine nous demande si on veut vraiment mettre à jour la DB, on pourrait perdre des données, nous acceptons.

Allons voir notre DB :

![DB presencescf2m](https://raw.githubusercontent.com/mikhawa/presence-cf2m/main/datas/img/screenshot-localhost_8080-2022.06.24-11_52_21.png "presencescf2m")

3 tables sont présentes, notre table `user`, la table de gestion des messages `messenger_messages`, et celle contenant nos migrations : `doctrine_migration_versions`

Pour savoir si le lien entre le fichier `src/Entity/User.php` et la table `user` est à jour, vous pouvez vérifier dans la console avec :

    php bin/console doctrine:migrations:status

### Amélioration de l'entité User

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Pour l'entité User, il vaut mieux faire les modifications dans Symfony car il a un rôle particulier.

Nous pouvons voir dans notre DB dans la table `user` que les champs ne correspondent pas tout à fait à ce que nous souhaiterions (unsigned, unique, etc) :

![Table user](https://raw.githubusercontent.com/mikhawa/presence-cf2m/main/datas/img/screenshot-localhost_8080-2022.06.24-12_07_58.png "Table user")
![Index user](https://raw.githubusercontent.com/mikhawa/presence-cf2m/main/datas/img/screenshot-localhost_8080-2022.06.24-12_08_28.png "Index user")

Nous allons donc remédier à cela en utilisant les attributs de références que vous trouverez ici : 

https://www.doctrine-project.org/projects/doctrine-orm/en/2.11/reference/attributes-reference.html

Et les appliquer sur `src/Entity/User.php`

Puis, régénérons les getters et setters avec

    php bin/console make:entity --regenerate

[Voir le fichier User après cette étape](https://github.com/mikhawa/presence-cf2m/blob/ef1e2ff266b96f4be26d30a8312b64fe6ddedd06/src/Entity/User.php)

Nous allons ensuite vérifier si on doit faire une migration avec la commande :

    php bin/console doctrine:migrations:diff

On peut ensuite migrer :

    php bin/console doctrine:migrations:migrate

Pour annuler une migration, on peut utiliser cette commande :

    php bin/console doctrine:migrations:execute --down DoctrineMigrations\\Version20220624114100

Et à nouveau l'exécuter comme ceci :

    php bin/console doctrine:migrations:execute --up DoctrineMigrations\\Version20220624114100

Et voici une table qui correspond mieux à nos besoins (vous remarquerez qu'il n'y a que des champs int, pas de smallint ou tinyint)

![user table](https://raw.githubusercontent.com/mikhawa/presence-cf2m/main/datas/img/screenshot-localhost_8080-2022.06.24-13_49_13.png "user table")

### Création d'une authentification

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Nous allons créer une zone d'authentification sur `User`

    php bin/console make:auth

Avec la page de login même si nous en avons déjà une, elle servira à adapter notre accueil

Les fichiers créés / modifiés :

- src/Security/UserAuthenticator.php
- src/Controller/SecurityController.php
- config/packages/security.yaml
- templates/security/login.html.twig

[Voir les fichiers après cette étape](https://github.com/mikhawa/presence-cf2m/commit/650018d5325567ded4bce8faf1598535f9a1d851)

Nous allons adapter le formulaire venant de `templates/security/login.html.twig` pour le mettre dans notre page d'accueil `templates/public/homepage.html.twig`

Puis faire de même en modifiant notre `src/Controller/PublicController.php` pour qu'il puisse exécuter les commandes de gestion de la sécurité du `src/Controller/SecurityController.php`

Puis dans le `src/Security/UserAuthenticator.php` nous modifions la route de l'identification :

    ...
    # public const LOGIN_ROUTE = 'app_login';
    public const LOGIN_ROUTE = 'app_homepage';
    ...

Dans `config/packages/security.yaml` nous modifions les lignes de redirection après connexion (Attention en yaml l'indentation est primordiale !) :

    logout:
                path: app_logout
                # where to redirect after logout
                # target: app_any_route
                target: app_homepage

### Insertion d'un utilisateur dans la DB

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Nous allons insérer un simple utilisateur pour tester notre connexion avec un utilisateur de base :

Nous allons d'abord crypter son mot de passe `util1`, via la console :

    php bin/console security:hash-password  util1

Nous obtiendrons un code ressemblant à cela correspondant à `util1` :

`$2y$13$SpkGmFgdOZq2H.T34dE2De/6uDkMQN2AgroA96TBMI9bTfY58.iRK`

Ensuite nous allons exécuter du SQL natif depuis la console, **Attention aux antislashes à mettre dans le mot de passe !** :

    php bin/console dbal:run-sql "INSERT INTO user (id, username, roles, password, thename, thesurname, themail, theuid, thestatus, thenationalid) VALUES (NULL, 'util1', '[\"ROLE_USER\"]', '\$2y\$13\$SpkGmFgdOZq2H.T34dE2De\/6uDkMQN2AgroA96TBMI9bTfY58.iRK', 'Util', 'Un', 'mike@cf2m.be', '62b8409f6ca621.51874765', '1', '11111111111');"

Vous devriez pouvoir vous connecter en tant que ROLE_USER avec ces identifiants :

- Login : util1
- PWD : util1

### Activation du remember me

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Nous allons activer le remember me (optionnel), mais intéressant pour les postes fixes qui vont utiliser notre système, pour plus de détails et les différentes options (comme la sécurisation supplémentaire en mettant les clefs dans la base de données etc) :

https://symfony.com/doc/current/security/remember_me.html

Dans `config/packages/security.yaml`

    firewalls:
        # ...
        main:
            # ...
            remember_me:
                secret:   '%kernel.secret%' # required
                lifetime: 2419200 # 4 weeks in seconds

Dans `src/Security/UserAuthenticator.php`

    ...
    # remember me
    use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
    ...
    public function authenticate(Request $request): Passport
    {
        // ...
        return new Passport(
            new UserBadge(...),
            new PasswordCredentials(...),
            [
                ...
                new RememberMeBadge(),
            ]
        );
    }

Nous pouvons maintenant supprimer les fichiers devenus inutiles :

Supprimons le cache avant la suppression :

    php bin/console cache:clear

- src/Controller/SecurityController.php
- templates/security/login.html.twig

# Base de données

J'ai créé à partir d'ici une base de donnée plus complète via workbench.

Voir le dossier [datas\db](https://github.com/QuentinFayt/presence-cf2m/commit/71f962ab804893357b9e5c3ac6dfb0f8b856ee12).

Je vais donc repartir de la base précédemment crée afin de la mettre à jour pour notre base. On peut, aux choix, exporter l'utilisateur déjà créé ou en refaire un.

Cette fois-ci on va donc procédé à la méthode inverse, récupérer une base de données déjà créée.

Pour générer des classes de mapping on va donc récupérer celles de la base de données avec la commande 

    php bin/console doctrine:mapping:import App\\Entity annotation --path=src/Entity

Suivi de

    php bin/console make:entity --regenerate

Pour génerer nos getter et setter, en lui donnant comme paramètre `App\Entity` pour que Symfony nous régénère toutes les entités d'un coup. 

Nous allons par contre devoir récupérer les informations que l'on avait généré pour l'utilisateur (copier coller de [ceci](https://github.com/QuentinFayt/presence-cf2m/blob/ef1e2ff266b96f4be26d30a8312b64fe6ddedd06/src/Entity/User.php)) en gardant la clef `name` généré par le mapping automatique.
La seule différence est que pour garder la référence aux nouvelles tables il faut rajouter ceci, en rajoutant le `name` préalablement sauvegarder. 

    #[ORM\UniqueConstraint(name:"UNIQ_8D93D649F85E0677", columns: ["username"])]

Ainsi que modifier le fichier

    config\packages\doctrine.yaml

En rajoutant

    doctrine
      orm
        App
          type: attribute

Pour que l'on puisse forcer la lecture des attributs.

### Répartition du travail

- [Retour au menu](https://github.com/mikhawa/presence-cf2m#arborescence)

Nous en sommes là !