<?php

namespace App\Controller;

use App\Entity\Restaurant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/restaurant", name="restaurant")
     */
    public function index()
    {
        return $this->render('restaurant/index.html.twig', [
            'controller_name' => 'RestaurantController',
        ]);
    }

    /**
     * @Route("/restaurant/{id}", name="restaurant_show", methods={"GET"})
     */
    public function show(Restaurant $id)
    {
    }

    /**
     * @Route("/restaurant/new", name="restaurant_new", methods={"GET"})
     */
    public function new()
    {
    }

    /**
     * @Route ("/restaurant", name="restaurant_create", methods{"POST"})
     */
    public function create()
    {
    }

    /**
     * @Route ("/restaurant/edit", name="restaurant_edit", methods{"GET, POST"})
     */
    public function edit(Restaurant $id)
    {
    }

    /**
     * @Route ("/restaurant", name="restaurant_delete", methods={"DELETE"})
     */
    public function delete(Restaurant $id)
    {
    }

}
