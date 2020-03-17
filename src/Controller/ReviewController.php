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
     * @Route("/review/{review}", name="review_show", methods={"GET"})
     * @Param Review $review
     */
    public function show(Review $review)
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
     * @Param Review $review
     */
    public function edit(Review $review)
    {
    }

    /**
     * @Route ("/review", name="review_delete", methods={"DELETE"})
     * @Param Review $review
     */
    public function delete(Review $review)
    {
    }
}
