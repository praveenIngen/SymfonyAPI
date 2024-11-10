<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends AbstractController
{
    /**
    * @Route("/", name="index", methods={"GET"})
    */
   public function index(CategoryRepository $categoryRepository, SerializerInterface $serializer): Response
   {
       $category = $categoryRepository->findAll();
       $data = $serializer->serialize($category, 'json');

       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }


   /**
    * @Route("/", name="create", methods={"POST"})
    */
   public function create(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
   {
       $requestData = $request->getContent();

       $category = $serializer->deserialize($requestData, Category::class, 'json');

       if (!$category->getName() || !$category->getDescription()) {
           return new JsonResponse(['error' => 'Missing required fields'], 400);
       }

       $entityManager->persist($category);
       $entityManager->flush();

       $data = $serializer->serialize($category, 'json');

       return new JsonResponse(['message' => 'category created!', 'category' => json_decode($data)], 201);
   }


   /**
    * @Route("/{id}", name="update", methods={"PUT"})
    */
   public function update(Category $category, Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
   {
       $requestData = $request->getContent();
       $updatedCategory = $serializer->deserialize($requestData, Category::class, 'json');

       $category->setName($updatedCategory->getName());
       $category->setDescription($updatedCategory->getDescription());

       $entityManager->flush();

       return new Response('Category updated!', 200);
   }


   /**
    * @Route("/{id}", name="delete", methods={"DELETE"})
    */
   public function delete(Category $category, EntityManagerInterface $entityManager): Response
   {
       $entityManager->remove($category);
       $entityManager->flush();

       return new Response('Category deleted!', 200);
   }
}
