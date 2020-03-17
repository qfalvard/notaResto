<?php

namespace App\Controller;

use App\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ReviewController extends AbstractController
{
    /**
     * @Route("/review", name="review")
     */
    public function index()
    {
        return $this->render('review/index.html.twig', [
            'controller_name' => 'ReviewController',
        ]);
    }

    /**
     * @Route("/review/{id}", name="review_show", methods={"GET"})
     */
    public function show(Review $id)
    {
    }

    /**
     * @Route("/review/new", name="review_new", methods={"GET"})
     */
    public function new()
    {
    }

    /**
     * @Route ("/review", name="review_create", methods{"POST"})
     */
    public function create()
    {
    }

    /**
     * @Route ("/review/edit", name="review_edit", methods{"GET, POST"})
     */
    public function edit(Review $id)
    {
    }

    /**
     * @Route ("/review", name="review_delete", methods={"DELETE"})
     */
    public function delete(Review $id)
    {
    }
}
