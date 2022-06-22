# presence-cf2m
Application web de relevé des présences stagiaires avec statistiques

### Prérequis

#### La configuration des serveurs de dev

Nous allons partir de la configuration de notre server de dev sur notre hébergeur.

- PHP 8.1.7
- SSL , https
- Calendar activé : https://www.php.net/manual/fr/book.calendar.php
- GMP activé : https://www.php.net/manual/fr/book.gmp.php
- Toutes les erreurs activées

#### Configuration serveur hébergeur :

##### APACHE - PHP

![Configuration serveur de dev](https://github.com/mikhawa/presence-cf2m/raw/main/datas/img/screenshot-2022.06.22-10_02_36.png "FR")

##### MariaDB

10.3.34-MariaDB-1:10.3.34

#### La configuration locale

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






