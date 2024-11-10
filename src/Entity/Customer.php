<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
   private ?string $name;


   #[ORM\Column(nullable: true)]
   private ?string $email;

   #[ORM\Column(nullable: true)]
   private ?string $address;


   #[ORM\Column(nullable: true)]
   private ?int $contact;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
   {
       return $this->name;
   }


   public function setName(string $name): self
   {
       $this->name = $name;

       return $this;
   }

   public function getEmail(): ?string
   {
       return $this->email;
   }


   public function setEmail(string $email): self
   {
       $this->email = $email;

       return $this;
   }

   public function getAddress(): ?string
   {
       return $this->address;
   }


   public function setAddress(string $address): self
   {
       $this->address = $address;

       return $this;
   }

   public function getContact(): ?int
   {
       return $this->contact;
   }


   public function setContact(int $contact): self
   {
       $this->contact = $contact;

       return $this;
   }
}
