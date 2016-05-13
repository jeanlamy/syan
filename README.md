# syan
Symfony and Angular POC

## syan-api

API Rest permettant de lister, ajouter, modifier et supprimer une idée.

Basé sur FOSRestBundle. Voir tutoriel ici :

http://obtao.com/blog/2013/12/creer-une-api-rest-dans-une-application-symfony/

dépendances :
* friendsofsymfony/rest-bundle : utilisé pour construire l'api facilement
* jms/serializer-bundle : serialise la sortie automatiquement
* nelmio/cors-bundle : gestion du cross scripting
* doctrine/doctrine-fixtures-bundle : gestion des data fixtures pour initialiser la base


Méthodes :

* api/ideas.json : liste des idées
* api/ideas/<id>.json : détail d'une idée


## syan-front

Front end avec AngularJS using 1.5.x

Voir tutoriel ici : http://www.sitepoint.com/kickstart-your-angularjs-development-with-yeoman-grunt-and-bower/
(attention, l'utilisation des outils décrits dans ce tutoriel nécessite Ruby sous Windows)
Lancer l'appli avec grunt :
  grunt serve --port 9000


## How-to

**API Setup**

First, create database, tables and load initial data :
```bash
cd syan-api
composer update
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load --purge-with-truncate
```

Optionaly run tests :
```bash
php bin/console doctrine:fixtures:load --purge-with-truncate
vendor\bin\phpunit.bat
```

Run server on default port (to access API via http://localhost:8000/api) :
```bash
php bin/console server:run
```


**Frontend setup**

Run server with grunt :
```bash
cd syan-front
grunt
grunt serve --port 9000
```
It will open a browser window at http://localhost:9000/