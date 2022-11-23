# Mes vols en parapentes

## Étape 1

### Base de données
Dans une base de données, créer la table ```fly```
Elle contient les champs suivants 

| nom      | type         | info                       | 
|----------|--------------|----------------------------|
| id       | int          | Primary key, autoincrement |
| date     | date         | default now                |
| location | varchar(200) | nom du site                |
| from     | int          | altitude de décollage      |
| to       | int          | altitude d'atterrissage    |
| time     | int          | durée du vol en minutes    |
| comment  | text         | nullable                   |

### Fichiers
#### index.php
Affiche la liste des vols.  
Pour chaque vol, un bouton "Afficher" renvoie sur la page de détail d'un vol  
Au-dessus du tableau, un bouton "Ajouter" renvoie sur le formulaire d'ajout.
#### add.php
Affiche le formulaire de création.
Le champ ```date``` est de type ```date``` et la date du jour est renseignée par défaut.  
Les champs ```from```, ```to``` et ```time``` sont de type ```number```  
Le champ ```comment``` est un ```textarea```  
Une fois la saisie enregistrée, on est redirigé sur la page de détail du vol  
#### edit.php
Affiche le formulaire d'édition.  
Toutes les valeurs déjà saisies du vol sont préremplies dans les différents champs.
Une fois la saisie enregistrée, on est redirigé sur la page de détail du vol  
#### delete.php
Supprime l'enregistrement en base de données et redirige sur la page de liste.
#### show.php
Affiche le détail d'un vol.  
Trois boutons sont accessibles : 
* Un bouton d'édition qui renvoie sur le formulaire d'édition
* Un bouton de suppression qui redirige sur la suppression
* Un bouton de retour à la liste

## Étape 2
### Autoloader
Mettre en place un système d'autoload des classes de votre projet.  
Réfléchir à l'organisation de vos namespaces, ils seront utilisés dans l'ensemble des étapes qui suivront (normalisation des noms des dossiers).  
Tous les namespaces de l'application commenceront par `App`

### La classe de gestion de la base de données
Créer une classe de connexion à la base de données.  
Cette classe respecte le design pattern du singleton avec un constructeur privé.  
Les paramètres de connexion à la base de données (dsn, username, password, ...) sont stockées dans des constantes de la classe.  
Utiliser cette classe dans l'ensemble des controllers.  
Pensez à gérer la déconnexion à la base de données 

### Séparation des controllers et des vues.
Le but est de ne plus mélanger le code PHP (hors affichage des variables) et l'HTML.
Le fichier de vue aura donc l'extension .html.php pour être reconnaissable (ex : `add.html.php`)  
Afin d'éviter la duplication de code, les vues pourront inclure un fichier de header (`header.html.php`) et un fichier de footer (`footer.html.php`)

### Création du modèle
Créer une classe de représentation d'un vol.  
La classe ```Fly``` n'aura que des propriétés privées (ajouter donc des getters et setters).
  
Créer une classe de repository pour les vols.  
La classe ```FlyRepository``` aura pour méthode :
* findAll : retourne une liste de vols (instance de ```Fly```)
* find : retourne un vol à partir de son identifiant (instance de ```Fly```)
* save : enregistre un vol (en création ou modification)

## Étape 3
### Moteur de template
Le but n'est pas de créer un vrai moteur de template (parsing, cache, ...) mais juste une classe outil en charge du rendu.
Cette classe permettra d'indiquer le layout à utiliser pour la vue et aura une méthode `render` recevant 2 paramètres :
1. Le template à afficher
2. Un tableau des variables et valeurs utilisées dans le template
Le but de cette classe est de gérer [l'output buffer de php](https://www.php.net/manual/fr/ref.outcontrol.php).

## Étape 4
### Class FlyController
Créer la classe FlyController dans un namespace `App\Controller`
Les fichiers `index.php`, `add.php`, `edit.php` et `delete.php` doivent être supprimés au profit de méthodes au sein de la classe `FlyController`

### Proxy et router
Le but est de n'utiliser qu'un seul point d'entrée pour votre page web : `index.php`  
Ce fichier sera en charge d'instancier le controller à utiliser (même si pour le moment il n'y en a qu'un seul) ainsi que la méthode à appeler à partir de paramètre de l'URL (voir de l'URI en elle-même si vous y arrivez).  


## Étape 5
### Les participants
Ajouter une table `participant`
Elle contient les champs suivants

| nom       | type         | info                                | 
|-----------|--------------|-------------------------------------|
| id        | int          | Primary key, autoincrement          |
| firstname | varchar(100) |                                     |
| lastname  | varchar(100) |                                     |
| level     | varchar(50)  | débutant / intermédiaire / confirmé |

Ajouter une table de relation entre `fly` et `participant`. Elle permet de savoir qui a participé à quel vol.  
Créer la classe `Participant`, son repository `ParticipantRepository`  
Créer un CRUD des participants.  
Permettre lors de création / édition d'un vol de sélectionner le ou les participants de celui-ci.  
Afficher la liste des participants dans le détail d'un vol et la liste des vols dans le détail d'un participant.

## Étape 6 (Boni)
### Validation
Mettre en place un système de validation pour l'ensemble des formulaires permettant de vérifier que les données saisies sont correctes et d'afficher les messages d'erreurs clairs dans la vue.

### Images
Permettre de télécharger des images pour chaque vol.  
Permettre de télécharger une photo de profil pour chaque participant.  




