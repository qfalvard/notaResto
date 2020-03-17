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
     * @Route("/city/{id}", name="city_show", methods={"GET"})
     */
    public function show(City $id)
    {
    }

    /**
     * @Route ("/city", name="city_create", methods{"POST"})
     */
    public function create()
    {
    }

    /**
     * @Route ("/city/edit", name="city_edit", methods{"GET, POST"})
     */
    public function edit(City $id)
    {
    }

    /**
     * @Route ("/city", name="city_delete", methods={"DELETE"})
     */
    public function delete(City $id)
    {
    }
}
