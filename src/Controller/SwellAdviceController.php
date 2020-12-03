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
      $spot = $repositorySpot->find($id);

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
      $spot = $repositorySpot->find($id);

        return $this->render('swell_advice/spotdetails.html.twig', [
            'controller_name' => 'SwellAdviceController', 'id' => $id, 'spot' => $spot,
        ]);
    }

    /**
     * @Route("/testimonials", name="testimonials")
     */
    public function testimonials_form(Request $requetteHttp, ObjectManager $manager)
    {
        $testimonials = new Testimonials();

        $testimonialsForm = $this->createForm(TestimonialsType::class,$testimonials);

        $testimonialsForm->handleRequest($requetteHttp);

        if($testimonialsForm->isSubmitted() && $testimonialsForm->isValid()){

            $manager->persist($testimonials);
            $manager->flush();

            return $this->redirectToRoute('index');

        }

        return $this->render('swell_advice/testimonialsForm.html.twig',['testimonialsFormView' => $testimonialsForm->createView()]);
    }
}
