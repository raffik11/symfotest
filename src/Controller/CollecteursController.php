<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollecteursController extends AbstractController
{
    #[Route('/collecteurs', name: 'app_collecteurs')]
    public function index(): Response
    {
        $entityManager = $doctirne -> getManager();
        $collecteur = new Collecteur();



        return $this->render('collecteurs/index.html.twig', [
            'controller_name' => 'CollecteursController',
        ]);
    }
}
