# Fish'nPool

Il s'agit d'une application permettant aux poissons de réserver une plage horaire dans la piscine municipale.
(L'interface physique poisson-machine est hors-périmètre, après tout leurs nageoires leur servent bien à naviguer)

Un développeur a déjà réalisé une partie de l'application, mais sa place est devenue soudainement vacante - suite à l'ingestion de fugu mal préparé.

Votre mission, si vous l'acceptez (c'est une formule, hein, vous n'avez pas vraiment le droit de ne pas l'accepter), sera donc :
* De prendre connaissance des fichiers sources
* De mettre en place un environnement de développement fonctionnel
  * PHP
  * Git
  * le fichier composer.json indique les prérequis, notamment :
    * la version de php
    * les extensions php qui doivent être installées
  * le binaire symfony (https://symfony.com/download)
    * cd sujet1
    * composer install
    * symfony serve
    
* De répondre aux questions suivantes :
  * Quelles sont les URLs que l'on peut visiter ? Que permettent-elles de faire ?

              /# page d'acuille pour voir l'ensemble de site.
              /list/nemo ou dory permete de voir des list de reservation les diferent utilisateur telle que nemo et dory
              /form le form qui permette de faire le reservation
    * _Indices_ : cf. Controller et security.yaml
  * Que peut-on faire comme remarques sur la sécurité ?

                la session et pas bien gere. 
                le debug est active ? 
  * A quoi sert le fichier "var/data.db" ? Que peut-on en dire ?
   
        C'est le fiche de SQLite il est utiliser pour stocker des données liées aux réservations stocke les informations telles que les réservations, les utilisateurs, les détails.

 * Avantages et inconvénients; pour quelle raison est-il en contrôle de sources sur ce projet ?

          Il est utilise pour ce projet car il est pas tres chargé et de ce la ca vien l'inconvéniens le SQLlite il est moins adapté aux charges de travail lourdes.
         Contrairement à MySQL ou PostgreSQL qui ont un serveur de base de données distinct, SQLite stocke toute la base de données dans un seul fichier, ce qui le rend facile à déployer et à gérer.
        
  * Quelle erreur le développeur a-t-il commise dans TimeSlot::getTimeSummary() ?
    * _Indice_ : La piscine est ouverte toute l'année, 24h/24, y compris fin mars et fin octobre.

* Effectuer (ou au moins décrire) des tâches de développement sur cette application :
  * une réécriture (refactorisation) d'une partie du code, sans modification fonctionnelle
    * _Indice_ : HomePage
  * une correction/modification très rapide
 
* Décrire brièvement quelles évolutions pourraient être faites sur cette application

