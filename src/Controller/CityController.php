<?php

namespace App\Controller;

use App\Entity\City;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    /**
     * @Route("/city", name="city")
     */
    public function index()
    {
        return $this->render('city/index.html.twig', [
            'controller_name' => 'CityController',
        ]);
    }

    /**
     * @Route("/city/{city}", name="city_show", methods={"GET"})
     * @param City $city
     */
    public function show(City $city)
    {
    }

    /**
     * @Route ("/city", name="city_create", methods={"POST"})
     */
    public function create()
    {
    }

    /**
     * @Route ("/city/{city}/edit", name="city_edit", methods={"GET, POST"})
     * @param City $city
     */
    public function edit(City $city)
    {
    }

    /**
     * @Route ("/city/{city}", name="city_delete", methods={"DELETE"})
     * @param City $city
     */
    public function delete(City $city)
    {
    }
}
