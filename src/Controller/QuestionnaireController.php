<?php
// src/Controller/QuestionnaireController.php
namespace App\Controller;

use App\Form\AlternantType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuestionnaireController extends AbstractController
{

     #[Route('/questionnaire', name: 'alternant_questionnaire')]
    public function questionnaire(Request $request): Response
    {
        $form = $this->createForm(AlternantType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            return $this->redirectToRoute('app_alternant');
        }

        return $this->render('questionnaire/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}

