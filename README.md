# Documentation

Pour lancer le test, il suffit de se placer dans la racine du projet.
Dans la racine du projet lancer la commande :

### docker-compose up
 
cette commande permet d'installer toutes les images nécessaire.

## Importer la base de données

rendez vous sur l'url de phpmyadmin pour importer la base de données qui se trouve à la racine du projet (testdb.sql):
login:root
password:root
### localhost:8086

Une fois la base de données est importer

se positionner sur le répertoire app du projet et lancer la commande:

### php uploadcsv.php
cette commande permet de lancer le script qui va charger les données du fichier csv dans la table user.

# Dernière étape
Pour visualiser les données du fichier csv rendez vous sur l'url :

### localhost:8084

## Info

ce projet utilse:

l'image 8.1-apache
l'image mysql:5.7.43
l'image phpmyadmin/phpmyadmin