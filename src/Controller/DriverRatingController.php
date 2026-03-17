<?php

namespace App\Controller;

use App\Entity\DriverRating;
use App\Form\DriverRatingType;
use App\Repository\DriverRatingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/driver/rating')]
final class DriverRatingController extends AbstractController
{
    #[Route(name: 'app_driver_rating_index', methods: ['GET'])]
    public function index(DriverRatingRepository $driverRatingRepository): Response
    {
        return $this->render('driver_rating/index.html.twig', [
            'driver_ratings' => $driverRatingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_driver_rating_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $driverRating = new DriverRating();
        $form = $this->createForm(DriverRatingType::class, $driverRating);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($driverRating);
            $entityManager->flush();

            return $this->redirectToRoute('app_driver_rating_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('driver_rating/new.html.twig', [
            'driver_rating' => $driverRating,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_driver_rating_show', methods: ['GET'])]
    public function show(DriverRating $driverRating): Response
    {
        return $this->render('driver_rating/show.html.twig', [
            'driver_rating' => $driverRating,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_driver_rating_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DriverRating $driverRating, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DriverRatingType::class, $driverRating);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_driver_rating_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('driver_rating/edit.html.twig', [
            'driver_rating' => $driverRating,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_driver_rating_delete', methods: ['POST'])]
    public function delete(Request $request, DriverRating $driverRating, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$driverRating->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($driverRating);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_driver_rating_index', [], Response::HTTP_SEE_OTHER);
    }
}
