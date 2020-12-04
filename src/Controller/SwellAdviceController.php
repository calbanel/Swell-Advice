<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SpotRepository;
use App\Entity\Spot;
use App\Repository\TestimonialsRepository;
use App\Entity\Testimonials;
use App\Repository\CityRepository;
use App\Entity\City;
use App\Repository\CountryRepository;
use App\Entity\Country;
use App\Form\TestimonialsType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class SwellAdviceController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
      $repositoryCountry=$this->getDoctrine()->getRepository(Country::class);
      $country = $repositoryCountry->find(1);
      $cities = $country->getCities();
        return $this->render('swell_advice/index.html.twig', ['cities' => $cities]);
    }

    /**
     * @Route("/spot/{id}", name="spot")
     */
    public function spot($id)
    {
      $repositorySpot=$this->getDoctrine()->getRepository(Spot::class);
      $spot = $repositorySpot->find($id);

        return $this->render('swell_advice/spot.html.twig', ['id' => $id, 'spot' => $spot,
        ]);
    }

    /**
     * @Route("/spot/{id}/details", name="spot_details")
     */
    public function spot_details($id)
    {
      $repositorySpot=$this->getDoctrine()->getRepository(Spot::class);
      $spot = $repositorySpot->find($id);

        return $this->render('swell_advice/spotdetails.html.twig', ['id' => $id, 'spot' => $spot,
        ]);
    }

    /**
     * @Route("/testimonials", name="testimonials")
     */
    public function testimonials_form(Request $requetteHttp)
    {
        $testimonials = new Testimonials();

        $testimonialsForm = $this->createForm(TestimonialsType::class,$testimonials);

        $testimonialsForm->handleRequest($requetteHttp);

        if($testimonialsForm->isSubmitted() && $testimonialsForm->isValid()){

            $this->getDoctrine()->getManager()->persist($testimonials);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('index');

        }

        return $this->render('swell_advice/testimonialsForm.html.twig',['testimonialsFormView' => $testimonialsForm->createView()]);
    }

    /**
     * @Route("/city/{name}", name="city")
     */
    public function city($name)
    {
      $repositoryCity=$this->getDoctrine()->getRepository(City::class);
      $city = $repositoryCity->findOneBy(['name' => $name]);

        return $this->render('swell_advice/city.html.twig', ['city' => $city]);
    }
}
