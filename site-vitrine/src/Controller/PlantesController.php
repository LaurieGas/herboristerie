<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlantesController extends AbstractController
{
    /**
     * @Route("/plantes", name="plantes")
     */
    public function index(): Response
    {
        return $this->render('plantes/plantes.html.twig', [
            'controller_name' => 'PlantesController',
        ]);
    }
}
