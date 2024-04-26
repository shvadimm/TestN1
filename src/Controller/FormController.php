<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/form', name: 'reservation_form')]
class FormController extends AbstractController
{
    public function __invoke(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ReservationType::class);
        $form->add('Valider', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Reservation $reservation */
            $reservation = $form->getData();
            $em->persist($reservation);
            $em->flush();
            $this->redirectToRoute('reservation_list', ['fishname' => $reservation->getFish()->getFishname()]);
        }
        return $this->render('form/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
