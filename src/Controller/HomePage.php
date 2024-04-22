<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[Route('/', name: 'homepage')]
class HomePage extends AbstractController
{
    public function __invoke(UrlGeneratorInterface $url)
    {
        $form_url = $url->generate('reservation_form');
        $list_url = $url->generate('reservation_list', ['fishname' => 'Nemo']);
        return new Response(<<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fish'n pool</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text><text y=%221.3em%22 x=%220.2em%22 font-size=%2276%22 fill=%22%23fff%22>sf</text></svg>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container py-4">
   <div class="p-5 mb-4 bg-body-tertiary rounded-3">
     <div class="container-fluid py-5">
       <h1 class="display-5 fw-bold">Bienvenue sur le site de réservation de Fish'n Pool</h1>
       <p>
         Cette application permettant aux poissons de réserver une plage horaire dans la piscine municipale.
         (L'interface physique poisson-machine est hors-périmètre, après tout leurs nageoires leur servent bien à naviguer)
       </p>
       <p>
         Le développeur ayant réalisé cette partie de l'application a été victime d'une ingestion de fugu mal préparé; sa place est devenue soudainement vacante.
       </p>
       <div class="row">
         <div class="col-md-6">
           <p class="fs-4">Haut les cœurs, et en avant les nageoires !</p>
           <a class="btn btn-primary btn-lg" href="$form_url">Réserver une plage</a>
         </div>
         <div class="col-md-6">
           <p class="fs-4">Qui va là ?</p>
           <a class="btn btn-outline-secondary btn-lg" href="$list_url">Voir mes réservations</a>
         </div>
       </div>
     </div>
   </div>

   <footer class="pt-3 mt-4 text-body-secondary border-top">
     © 2024
   </footer>
</div>
</body>
</html>
HTML);
    }
}
