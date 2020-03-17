<?php

namespace App\Controller;

use App\Entity\RestaurantPicture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantPictureController extends AbstractController
{
    /**
     * @Route("/restaurant/picture", name="restaurant_picture")
     */
    public function index()
    {
        return $this->render('restaurant_picture/index.html.twig', [
            'controller_name' => 'RestaurantPictureController',
        ]);
    }

    /**
     * @Route("/picture/{id}", name="picture_show", methods={"GET"})
     * @Param RestaurantPicture $id
     */
    public function show(RestaurantPicture $id)
    {
    }

    /**
     * @Route("/picture/new", name="picture_new", methods={"GET"})
     */
    public function new()
    {
    }

    /**
     * @Route ("/picture", name="picture_create", methods{"POST"})
     */
    public function create()
    {
    }

    /**
     * @Route ("/picture/edit", name="picture_edit", methods{"GET, POST"})
     * @Param RestaurantPicture $id
     */
    public function edit(RestaurantPicture $id)
    {
    }

    /**
     * @Route ("/picture", name="picture_delete", methods={"DELETE"})
     * @Param RestaurantPicture $id
     */
    public function delete(RestaurantPicture $id)
    {
    }
}
