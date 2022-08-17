<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Eleveur;
use App\Repository\EleveurRepository;

class ListElveursController extends AbstractController
{
    #[Route('/list/elveurs', name: 'app_list_elveurs')]
    public function index(EleveurRepository $repo): Response
    {
        $eleveurs = $repo ->findAll();

        return $this->render('list_elveurs/index.html.twig', [
            'controller_name' => 'ListElveursController',
            'eleveurs' => $eleveurs
        ]);
    }
}
