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
     * @Route("/picture/{picture}", name="picture_show", methods={"GET"})
     * @param RestaurantPicture $picture
     */
    public function show(RestaurantPicture $picture)
    {
    }

    /**
     * @Route("/picture/new", name="picture_new", methods={"GET"})
     */
    public function new()
    {
    }

    /**
     * @Route ("/picture", name="picture_create", methods={"POST"})
     */
    public function create()
    {
    }

    /**
 * @Route ("/picture/{picture}/edit", name="picture_edit", methods={"GET, POST"})
     * @param RestaurantPicture $picture
     */
    public function edit(RestaurantPicture $picture)
    {
    }

    /**
     * @Route ("/picture/{picture}", name="picture_delete", methods={"DELETE"})
     * @param RestaurantPicture $picture
     */
    public function delete(RestaurantPicture $picture)
    {
    }
}
