<?php
// src/Controller/PmeController.php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\OffreType;
use App\Repository\AlternantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PmeController extends AbstractController
{
    // Route pour afficher les offres publiées par la PME
    #[Route('/pme/mes-offres', name: 'pme_mes_offres')]
    public function mesOffres(EntityManagerInterface $entityManager): Response
    {
        // Récupérer les offres depuis la base de données
        $offres = $entityManager->getRepository(Offre::class)->findAll();

        return $this->render('mes_offres/index.html.twig', [
            'offres' => $offres,
        ]);
    }

    // Route pour ajouter une nouvelle offre
    #[Route('/pme/ajouter-offre', name: 'pme_ajouter_offre')]
    public function ajouterOffre(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Créer une instance de l'entité Offre
        $offre = new Offre();

        // Créer le formulaire basé sur l'entité Offre
        $form = $this->createForm(OffreType::class, $offre);

        // Gérer la soumission du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrer l'offre dans la base de données
            $entityManager->persist($offre);
            $entityManager->flush();

            // Ajouter un message flash de succès
            $this->addFlash('success', 'Offre publiée avec succès !');

            // Rediriger vers la page des offres
            return $this->redirectToRoute('pme_mes_offres');
        }

        // Affichage du formulaire pour ajouter une offre
        return $this->render('nouvelle_offre/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/mes-offres/{id}/alternants', name: 'mes_offres_alternants')]
    public function alternants(Offre $offre, AlternantRepository $alternantRepository): Response
    {
        // Récupérer tous les alternants ayant postulé à cette offre
        $alternants = $alternantRepository->findByOffre($offre);

        return $this->render('alternant_offre/index.html.twig', [
            'offre' => $offre,
            'alternants' => $alternants,
        ]);
    }

}
