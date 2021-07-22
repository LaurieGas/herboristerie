<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class CompteController extends AbstractController
{
    /**
     * @Route("/connexion", name="compte_connexion", methods={"GET","POST"})
     */
    public function connexion(): Response
    {
        // récupérer l'erreur si il y en a une
        // $error = $authenticationUtils->getLastAuthenticationError();

        // dernier mail entré par l'utilisateur
        // $lastEmail = $authenticationUtils->getLastUsername();


        return $this->render('compte/connexion.html.twig', [
            // 'last_email' => $lastEmail,
            // 'error' => $error,
        ]);
    }
}
