<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Collecteur;
use App\Form\CollecteurType;


class CollecteursController extends AbstractController
{
    #[Route('/collecteurs', name: 'app_collecteurs')]
    public function index(collecteur $collecteur =null, ManagerRegistry $doctirne, Request $request): Response
    {
        $entityManager = $doctirne -> getManager();
        $collecteur = new Collecteur();

        $form = $this -> createForm(collecteurType::class, $collecteur );

        $form -> handleRequest($request);

        if ($form -> isSubmitted() && $form -> isValid() ){
            $collecteur = $form -> getData();
            $entityManager -> persist($collecteur);
            $entityManager -> flush();
            return  $this -> redirectToRoute('app_collecteurs');
        }



        return $this->render('collecteurs/index.html.twig', [
            'controller_name' => 'CollecteursController',
            'formCollecteur' => $form -> createView(),
        ]);
    }
}
