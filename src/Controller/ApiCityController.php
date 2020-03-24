<?php

namespace App\Controller;

use App\Repository\CityRepository;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ApiCityController extends AbstractController
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
     * @Route("/api/cities", methods={"GET"}, name="api_cities")
     */
    public function index(CityRepository $cityRepository)
    {
        $cities = $cityRepository->findAll();

        $data = $this->serializer->normalize($cities, null, ['groups' => 'all_cities']);

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
}