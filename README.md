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

               /# page d'accueil pour voir l'enssemble du site.
               /liste/nemo ou dory permet de voir des listes de reservation les diferent utilisateur telles que nemo et dory
               /form le formulaire qui permet de faire une reservation pour l'utilisateur
    * _Indices_ : cf. Controller et security.yaml
  * Que peut-on faire comme remarques sur la sécurité ?

                la session est mal géré. 
                le debug est actif.
  * A quoi sert le fichier "var/data.db" ? Que peut-on en dire ?
   
                C'est la fiche de SQLite elle est utilisé pour stocker des données liées aux réservations stocke les informations telles que les réservations, les utilisateurs, et les détails.

 * Avantages et inconvénients; pour quelle raison est-il en contrôle de sources sur ce projet ?

                Il est Utilisé pour ce projet car il n'est pas très lourd et l'inconvéniens vient de cela le SQLlite est moins adapté aux charges de travail lourdes.
                Contrairement à MySQL ou PostgreSQL qui ont un serveur de base de données distinct, SQLite stocke toute la base de données dans un seul fichier, ce qui le rend facile à déployer et à gérer.
        
  * Quelle erreur le développeur a-t-il commise dans TimeSlot::getTimeSummary() ?
    * _Indice_ : La piscine est ouverte toute l'année, 24h/24, y compris fin mars et fin octobre.

               Dans la méthode getTimeSummary(), le développeur a fait une erreur en calculant l'heure de fin du créneau horaire. 
               ($this->duration + (int)$this->start_time->format('H')).':'.$this->start_time->format('i')
              Ici il essaie d'ajouter la durée du créneau horaire à l'heure de début du créneau pour obtenir l'heure de fin mais il ne tient pas compte du passage à un nouveau jour lorsque le créneau horaire dépasse minuit.
              Par example le $this->start_time soit 23h00 et que la durée du créneau soit de 2 heures 23+2=25 ca ne vas pas valide le format d'heure 24 heures.
              
              correction:
                  public function getTimeSummary() {
                 // Cloner le temps de début pour éviter de modifier l'original
               $endTime = clone $this->start_time;
    
                // Ajouter la durée au temps de début pour obtenir l'heure de fin
                $endTime->add(new DateInterval('PT' . $this->duration . 'H'));
    
                // Formater les temps de début et de fin dans le format 'heure:minute'
               return sprintf("%s - %s (%dh)",
                  $this->start_time->format('H:i'), // Formatage du temps de début
                  $endTime->format('H:i'), // Formatage du temps de fin
                  $this->duration // Durée du créneau horaire
              );
          }
* Effectuer (ou au moins décrire) des tâches de développement sur cette application :
  * une réécriture (refactorisation) d'une partie du code, sans modification fonctionnelle
    * _Indice_ : HomePage
  * une correction/modification très rapide
         
             je re organiser le contenu de la page de manière plus cohérente, avec une disposition en grille pour les différentes sections

   
* Décrire brièvement quelles évolutions pourraient être faites sur cette application

                 V2 : Ajoutez les fonctionnalités telles que la modification des utilisateurs / des horaires, l'ajout d'utilisateurs et la suppression. Modernisez l'aspect visuel et rendez-le plus convivial pour une meilleure compréhension." 
                 V3 : Ajoutez le calendrier avec les plages horaires (Avec le system drag and drop).
                 

