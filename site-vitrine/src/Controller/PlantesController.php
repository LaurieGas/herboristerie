<?php

namespace App\Controller;

use App\Entity\Plante;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlantesController extends AbstractController
{
    /**
     * @Route("/plantes", name="plantes")
     */
    public function index(): Response
    {
        $plantes = $this->getDoctrine()->getRepository(Plante::class)->findAll();
        return $this->render('plantes/plantes.html.twig', [
            'plante' => $plantes,
        ]);
    }

    /**
     * @Route("/fiches/{id}", name="fiches")
     */
    public function show(int $id)
    {
        $fiche = $this->getDoctrine()->getRepository(Plante::class)->find($id);
        return $this->render('plantes/fiches.html.twig', [
            'fichePlante' => $fiche
        ]);
    }
}
