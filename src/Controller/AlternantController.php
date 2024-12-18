<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AlternantController extends AbstractController
{
    #[Route('/alternant', name: 'app_alternant')]
    public function index(): Response
    {
        return $this->render('alternant/index.html.twig', [
            'controller_name' => 'AlternantController',
        ]);
    }
}
