<?php

namespace App\Controller;

use App\Entity\Tisane;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TisanesController extends AbstractController
{
    /**
     * @Route("/tisanes", name="tisanes")
     */
    public function index(): Response
    {
        $tisanes = $this->getDoctrine()->getRepository(Tisane::class)->findAll();
        return $this->render('tisanes/tisanes.html.twig', [
            'tisane' => $tisanes
        ]);
        // return $this->render('tisanes/tisanes.html.twig', [
        //     'controller_name' => 'TisanesController',
        // ]);
    }
}
