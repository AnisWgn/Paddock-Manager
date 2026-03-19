<?php

namespace App\Controller;

use App\Repository\DriverRatingRepository;
use App\Repository\DriverRepository;
use App\Repository\GameRepository;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function __invoke(
        Request $request,
        TeamRepository $teamRepository,
        DriverRepository $driverRepository,
        GameRepository $gameRepository,
        DriverRatingRepository $driverRatingRepository
    ): Response {
        $search = $request->query->get('q', '');
        $teams = $teamRepository->findAll();
        $drivers = $driverRepository->findAll();

        $driverRatings = $driverRatingRepository->findAll();
        usort($driverRatings, fn ($a, $b) => ($b->getOverall() ?? 0) <=> ($a->getOverall() ?? 0));

        return $this->render('home/index.html.twig', [
            'teams' => $teams,
            'drivers' => $drivers,
            'games' => $gameRepository->findAll(),
            'search' => $search,
            'driver_ratings' => $driverRatings,
        ]);
    }
}
