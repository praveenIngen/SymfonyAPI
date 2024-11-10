<?php

// src/Controller/ProductController.php
namespace App\Controller;


use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
* @Route("/api/products", name="product_api")
*/
class ProductController extends AbstractController
{
   /**
    * @Route("/", name="index", methods={"GET"})
    */
   public function index(ProductRepository $productRepository, SerializerInterface $serializer): Response
   {
       $products = $productRepository->findAll();
       $data = $serializer->serialize($products, 'json');

       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }


   /**
    * @Route("/{id}", name="show", methods={"GET"})
    */
   public function show(Product $product, SerializerInterface $serializer): Response
   {
       $data = $serializer->serialize($product, 'json');
       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }


   /**
    * @Route("/", name="create", methods={"POST"})
    */
   public function create(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
   {
       $requestData = $request->getContent();

       $product = $serializer->deserialize($requestData, Product::class, 'json');

       if (!$product->getName() || !$product->getDescription() || !$product->getPrice()) {
           return new JsonResponse(['error' => 'Missing required fields'], 400);
       }

       $entityManager->persist($product);
       $entityManager->flush();

       $data = $serializer->serialize($product, 'json');

       return new JsonResponse(['message' => 'Product created!', 'product' => json_decode($data)], 201);
   }


   /**
    * @Route("/{id}", name="update", methods={"PUT"})
    */
   public function update(Product $product, Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
   {
       $requestData = $request->getContent();
       $updatedProduct = $serializer->deserialize($requestData, Product::class, 'json');

       $product->setName($updatedProduct->getName());
       $product->setDescription($updatedProduct->getDescription());
       $product->setPrice($updatedProduct->getPrice());
       $product->setQuantity($updatedProduct->getQuantity());
       $product->setCategory($updatedProduct->getCategory());

       $entityManager->flush();

       return new Response('Product updated!', 200);
   }


   /**
    * @Route("/{id}", name="delete", methods={"DELETE"})
    */
   public function delete(Product $product, EntityManagerInterface $entityManager): Response
   {
       $entityManager->remove($product);
       $entityManager->flush();

       return new Response('Product deleted!', 200);
   }
}
