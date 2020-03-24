<?php

namespace App\Controller;

use App\Entity\City;
use App\Entity\Restaurant;
use App\Entity\User;
use App\Repository\RestaurantRepository;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ApiRestaurantController extends AbstractController
{

    public $serializer;



    public function __construct()
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer($classMetadataFactory)];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/api/restaurants", methods={"GET"}, name="api_restaurants")
     */
    public function index(RestaurantRepository $restaurantRepository)
    {
        $restaurants = $restaurantRepository->findAll();

        $data = $this->serializer->normalize($restaurants, null, ['groups' => 'all_restaurants']);

        $jsonContent = $this->serializer->serialize($data, 'json');

        $response = new Response($jsonContent);

        // On ajoute quelques headers pour préciser le type de données qui arrivera par notre API
        $response->headers->set('Content-Type', 'application/json');

        // Enfin, on retourne la réponse !
        return $response;
        // return $this->render('api_restaurant/index.html.twig', [
        //     'controller_name' => 'ApiRestaurantController',
        // ]);
    }

    /**
     * @Route("/api/restaurants", methods={"POST"}, name="api_new")
     */
    public function new(Request $request)
    {
        $restaurant = new Restaurant();
        $restaurant->setName($request->request->get('name'));
        $restaurant->setDescription($request->request->get('description'));
        
        $user = $this->getDoctrine()->getRepository(User::class)->find(1);
        $city = $this->getDoctrine()->getRepository(City::class)->find(1);

        $restaurant->setUser($user);
        $restaurant->setCity($city);

        // $data = $this->serializer->normalize($restaurant, null, ['groups' => 'all_restaurants']);

        // $jsonContent = $this->serializer->serialize($data, 'json');

        // $response = new Response($jsonContent);

        // // On ajoute quelques headers pour préciser le type de données qui arrivera par notre API
        // $response->headers->set('Content-Type', 'application/json');


        // $em = $this->get('doctrine.orm.entity_manager');
        $em = $this->getDoctrine()->getManager();
        $em->persist($restaurant);
        $em->flush();
        // Enfin, on retourne la réponse !
        return new Response(null);

    }
}
