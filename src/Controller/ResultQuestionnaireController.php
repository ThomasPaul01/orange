<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultQuestionnaireController extends AbstractController
{

    #[Route('//mes-offres/alternants/questionnaire', name: 'alternant_questionnaire_questionnaire')]

    public function index(): Response
    {
        // Données fictives pour l'exemple
        $resultats = [
            1 => [
                'domaine' => 'Informatique',
                'rythme' => '1 semaine entreprise, 1 semaine école',
                'duree' => '12 mois',
                'region' => 'Île-de-France',
                'visio' => 'Oui',
                'niveau_etude' => 'Bac+3',
                'qualite_personnel' => 'Dynamique',
                'handicap' => 'Auditif'
            ],
            2 => [
                'domaine' => 'Ressources Humaines',
                'rythme' => '2 semaines entreprise, 2 semaines école',
                'duree' => '24 mois',
                'region' => 'Provence-Alpes-Côte d\'Azur',
                'visio' => 'Non',
                'niveau_etude' => 'Bac+5',
                'qualite_personnel' => 'Organisé',
                'handicap' => 'Aucun'
            ],

        ];


        // Récupérer les résultats pour l'ID donné
        $resultat = $resultats[1];


        // Retourner la réponse en rendant la vue avec les résultats
        return $this->render('result_questionnaire/index.html.twig', [
            'resultats' => $resultat
        ]);
    }
}
