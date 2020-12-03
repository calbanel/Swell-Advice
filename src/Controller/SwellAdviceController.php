<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SwellAdviceController extends AbstractController
{
    /**
     * @Route("/swell/advice", name="swell_advice")
     */
    public function index(): Response
    {
        return $this->render('swell_advice/index.html.twig', [
            'controller_name' => 'SwellAdviceController',
        ]);
    }
}
