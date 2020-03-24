<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiUserController extends AbstractController
{
    public function __construct()
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer($classMetadataFactory)];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @Route("/api/users", methods={"GET"}, name="api_users")
     */
    public function index(UserRepository $userRepository)
    {
        $users = $userRepository->findAll();

        $data = $this->serializer->normalize($users, null, ['groups' => 'all_users']);

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
