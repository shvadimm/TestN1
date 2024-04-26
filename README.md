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
    * _Indices_ : cf. Controller et security.yaml
  * Que peut-on faire comme remarques sur la sécurité ?
  * A quoi sert le fichier "var/data.db" ? Que peut-on en dire ?
    * Avantages et inconvénients; pour quelle raison est-il en contrôle de sources sur ce projet ?
  * Quelle erreur le développeur a-t-il commise dans TimeSlot::getTimeSummary() ?
    * _Indice_ : La piscine est ouverte toute l'année, 24h/24, y compris fin mars et fin octobre.

* Effectuer (ou au moins décrire) des tâches de développement sur cette application :
  * une réécriture (refactorisation) d'une partie du code, sans modification fonctionnelle
    * _Indice_ : HomePage
  * une correction/modification très rapide
 
* Décrire brièvement quelles évolutions pourraient être faites sur cette application
