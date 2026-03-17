<?php

namespace App\Controller;

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
        GameRepository $gameRepository
    ): Response {
        $search = $request->query->get('q', '');
        $teams = $teamRepository->findAll();
        $drivers = $driverRepository->findAll();

        $driverStandings = array_map(function ($driver): array {
            $ratings = $driver->getDriverRatings()->toArray();
            $points = array_sum(array_map(
                static fn ($rating): int => $rating->getOverall() ?? 0,
                $ratings
            ));
            $average = count($ratings) > 0 ? round($points / count($ratings), 1) : 0;

            return [
                'driver' => $driver,
                'name' => trim(($driver->getFirstName() ?? '').' '.($driver->getLastName() ?? '')),
                'team' => $driver->getTeam()?->getName() ?? 'Sans écurie',
                'code' => $driver->getCode() ?? '---',
                'country' => $driver->getNationality() ?? '—',
                'points' => $points,
                'average' => $average,
                'races' => count($ratings),
            ];
        }, $drivers);

        usort($driverStandings, static function (array $left, array $right): int {
            if ($left['points'] !== $right['points']) {
                return $right['points'] <=> $left['points'];
            }

            if ($left['average'] !== $right['average']) {
                return $right['average'] <=> $left['average'];
            }

            return $left['name'] <=> $right['name'];
        });

        $leaderPoints = $driverStandings[0]['points'] ?? 0;
        foreach ($driverStandings as $index => &$standing) {
            $standing['position'] = $index + 1;
            $standing['gap'] = max(0, $leaderPoints - $standing['points']);
        }
        unset($standing);

        $teamStandings = array_map(function ($team): array {
            $points = 0;
            $driversCount = $team->getDrivers()->count();

            foreach ($team->getDrivers() as $driver) {
                foreach ($driver->getDriverRatings() as $rating) {
                    $points += $rating->getOverall() ?? 0;
                }
            }

            return [
                'team' => $team,
                'name' => $team->getName() ?? 'Écurie',
                'country' => $team->getCountry() ?? '—',
                'points' => $points,
                'driversCount' => $driversCount,
            ];
        }, $teams);

        usort($teamStandings, static function (array $left, array $right): int {
            if ($left['points'] !== $right['points']) {
                return $right['points'] <=> $left['points'];
            }

            return $left['name'] <=> $right['name'];
        });

        $leaderTeamPoints = $teamStandings[0]['points'] ?? 0;
        foreach ($teamStandings as $index => &$standing) {
            $standing['position'] = $index + 1;
            $standing['gap'] = max(0, $leaderTeamPoints - $standing['points']);
        }
        unset($standing);

        return $this->render('home/index.html.twig', [
            'teams' => $teams,
            'drivers' => $drivers,
            'games' => $gameRepository->findAll(),
            'search' => $search,
            'driver_standings' => $driverStandings,
            'team_standings' => $teamStandings,
        ]);
    }
}
