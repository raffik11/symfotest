<?php

namespace App\Controller;

use App\Entity\Eleveur;
use App\Form\ElveurType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\form\formBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class EleveursController extends AbstractController
{


    #[Route('/eleveurs', name: 'app_eleveurs')]
   public function index(Eleveur $Eleveur = null, Request $request,ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $Eleveur = new Eleveur();

        $form = $this -> createForm(ElveurType::class, $Eleveur);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $Eleveur = $form->getData();

            $entityManager -> persist($Eleveur);
            $entityManager -> flush();

            return $this->redirectToRoute('app_eleveurs');
        }

       
        return $this->render('eleveurs/index.html.twig', [
            'controller_name' => 'EleveursController',
            'formElveur' => $form -> createView(),
        ]);

    }
}

