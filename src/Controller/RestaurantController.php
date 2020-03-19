<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Form\RestaurantType;
use App\Repository\CityRepository;
use App\Repository\RestaurantRepository;
use App\Repository\ReviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{

    /**
     * @Route("/restaurant", name="restaurant_index", methods={"GET"}, requirements={"restaurant"="\d+"})
     */
    public function index(RestaurantRepository $restaurantRepository): Response
    {
        $restaurants = $restaurantRepository->findAll();
        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $restaurants,
        ]);
    }



    /**
     * @Route("/restaurant/{restaurant}", name="restaurant_show", methods={"GET"}, requirements={"restaurant"="\d+"})
     * @param Restaurant $restaurant
     */
    public function show(Restaurant $restaurant)
    {
        return $this->render('restaurant/show.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * @Route("/restaurant/new", name="restaurant_new", methods={"GET"})
     */
    public function new()
    {
        $restaurant = new Restaurant;
        $form = $this->createForm(RestaurantType::class, $restaurant);

        // On veut que le user du restaurant soit le user connecté (on l'a grâce à $this->getUser())
        $restaurant->setUser($this->getUser());

        return $this->render('restaurant/form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/restaurant", name="restaurant_create", methods={"POST"})
     */
    public function create()
    {
    }

    /**
     * @Route ("/restaurant/{restaurant}/edit", name="restaurant_edit", methods={"GET, POST"})
     * @param Restaurant $restaurant
     */
    public function edit(Restaurant $restaurant)
    {
    }

    /**
     * @Route ("/restaurant:{restaurant}", name="restaurant_delete", methods={"DELETE"})
     * @param Restaurant $restaurant
     */
    public function delete(Restaurant $restaurant)
    {
    }

}
