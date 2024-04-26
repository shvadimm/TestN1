<?php

namespace App\Controller;

use App\Entity\Fish;
use App\Entity\Reservation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ListController extends AbstractController
{
    #[Route('/list/{fishname}', name: 'reservation_list')]
    public function index(EntityManagerInterface $em, string $fishname): Response
    {
        $fish = $em->getRepository(Fish::class)->findOneBy(['fishname' => $fishname]);
        $reservations = $em->getRepository(Reservation::class)->findBy(['fish' => $fish]);
        return $this->render('list/index.html.twig', [
            'fish' => $fish,
            'reservations' => $reservations,
        ]);
    }

    #[Route('/remove/{fishname}/{id<\d+>}', name: 'api_remove', methods: ['POST'])]
    public function apiRemove(EntityManagerInterface $em, string $fishname, int $id): Response
    {
        $fish = $em->getRepository(Fish::class)->findOneBy(['fishname' => $fishname]);
        $reservation = $em->getRepository(Reservation::class)->findOneBy(['fish' => $fish, 'id' => $id]);
        $em->remove($reservation);
        $em->flush();
        return new JsonResponse(['success' => true]);
    }
}
