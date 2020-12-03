<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SpotRepository;
use App\Entity\Spot;
use Doctrine\Common\Persistence\ObjectManager;

class SwellAdviceController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('swell_advice/index.html.twig', [
            'controller_name' => 'SwellAdviceController',
        ]);
    }

    /**
     * @Route("/spot/{id}", name="spot")
     */
    public function spot($id)
    {
      $repositorySpot=$this->getDoctrine()->getRepository(Spot::class);
      $spot = $repositorySpot->findBy($id);

        return $this->render('swell_advice/spot.html.twig', [
            'controller_name' => 'SwellAdviceController', 'id' => $id, 'spot' => $spot,
        ]);
    }

    /**
     * @Route("/spot/{id}/details", name="spot_details")
     */
    public function spot_details($id)
    {
      $repositorySpot=$this->getDoctrine()->getRepository(Spot::class);
      $spot = $repositorySpot->findBy($id);

        return $this->render('swell_advice/spotdetails.html.twig', [
            'controller_name' => 'SwellAdviceController', 'id' => $id, 'spot' => $spot,
        ]);
    }
}
