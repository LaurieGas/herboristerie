<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NousContacterController extends AbstractController
{
    /**
     * @Route("/nousContacter", name="nousContacter")
     */
    public function index(): Response
    {
        return $this->render('nous_contacter/nousContacter.html.twig', [
            'controller_name' => 'NousContacterController',
        ]);
    }
}
