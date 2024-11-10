<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class CustomerController extends AbstractController
{
   /**
    * @Route("/", name="index", methods={"GET"})
    */
    public function index(CustomerRepository $customerRepository, SerializerInterface $serializer): Response
   {
       $category = $customerRepository->findAll();
       $data = $serializer->serialize($category, 'json');

       return new Response($data, 200, ['Content-Type' => 'application/json']);
   }


   /**
    * @Route("/", name="create", methods={"POST"})
    */
   public function create(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
   {
       $requestData = $request->getContent();

       $customer = $serializer->deserialize($requestData, Customer::class, 'json');

       if (!$customer->getName() || !$customer->getDescription()) {
           return new JsonResponse(['error' => 'Missing required fields'], 400);
       }

       $entityManager->persist($customer);
       $entityManager->flush();

       $data = $serializer->serialize($customer, 'json');

       return new JsonResponse(['message' => 'Customer created!', 'category' => json_decode($data)], 201);
   }


   /**
    * @Route("/{id}", name="update", methods={"PUT"})
    */
   public function update(Customer $customer, Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
   {
       $requestData = $request->getContent();
       $updatedCustomer = $serializer->deserialize($requestData, Customer::class, 'json');

       $customer->setName($updatedCustomer->getName());
       $customer->setDescription($updatedCustomer->getDescription());

       $entityManager->flush();

       return new Response('Customer updated!', 200);
   }


   /**
    * @Route("/{id}", name="delete", methods={"DELETE"})
    */
   public function delete(Customer $customer, EntityManagerInterface $entityManager): Response
   {
       $entityManager->remove($customer);
       $entityManager->flush();

       return new Response('Customer deleted!', 200);
   }

}
