<?php

namespace App\Controller\Admin;

use App\Entity\Fish;
use App\Entity\Reservation;
use App\Entity\TimeSlot;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(FishCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle("Fish'n pool");
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Poissons', 'fas fa-fish', Fish::class);
        yield MenuItem::linkToCrud('Plages horaire', 'fas fa-clock', TimeSlot::class);
        yield MenuItem::linkToCrud('Réservations', 'fas fa-calendar', Reservation::class);
    }
}
