<?php
namespace App\Controller;

use App\Entity\Alternant;
use App\Form\AlternantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function inscription(Request $request, EntityManagerInterface $em): Response
    {
        $alternant = new Alternant();
        $form = $this->createForm(AlternantType::class, $alternant);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Encodage du mot de passe
            $alternant->setPassword(
                password_hash($alternant->getPassword(), PASSWORD_BCRYPT)
            );

            $em->persist($alternant);
            $em->flush();

            $this->addFlash('success', 'Inscription réussie !');
            return $this->redirectToRoute('app_alternant');
        }

        return $this->render('inscription/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
