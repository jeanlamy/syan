# syan
Symfony and Angular POC

## syan-api

API Rest permettant de lister, ajouter, modifier et supprimer une idée.

Basé sur FOSRestBundle. Voir tutoriel ici :

http://obtao.com/blog/2013/12/creer-une-api-rest-dans-une-application-symfony/

2 dépendances :
* friendsofsymfony/rest-bundle
* jms/serializer-bundle


Méthodes :
* api/ideas.json : liste des idées
* api/ideas/<id>.json : détail d'une idée


## syan-front

Front end avec AngularJS using 1.5.x

Voir tutoriel ici : http://www.sitepoint.com/kickstart-your-angularjs-development-with-yeoman-grunt-and-bower/
(attention, l'utilisation des outils décrits dans ce tutoriel nécessite Ruby sous Windows)
Lancer l'appli avec grunt :
  grunt serve --port 9000


@todo :
- formulaire d'ajout/modification/suppression
- api de suppression d'une idée
- api de modification d'une idée
- api de creation d'une idée
- finalisation