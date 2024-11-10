<?php


namespace App\Entity;


use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
  #[ORM\Id]
   #[ORM\GeneratedValue]
   #[ORM\Column]
   private ?int $id = null;


   #[ORM\Column(length: 255, nullable: true)]
   private ?string $name;


   #[ORM\Column(nullable: true)]
   private ?string $description;


   #[ORM\Column(nullable: true)]
   private ?float $price;

   #[ORM\Column(nullable: true)]
   private ?int $quantity;

   #[ORM\Column(nullable: true)]
   private ?string $category;


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


   public function getDescription(): ?string
   {
       return $this->description;
   }


   public function setDescription(string $description): self
   {
       $this->description = $description;

       return $this;
   }


   public function getPrice(): ?float
   {
       return $this->price;
   }


   public function setPrice(float $price): self
   {
       $this->price = $price;

       return $this;
   }

   public function getQuantity(): ?int
   {
       return $this->quantity;
   }


   public function setQuantity(float $quantity): self
   {
       $this->quantity = $quantity;

       return $this;
   }

   public function getCategory(): ?string
   {
       return $this->category;
   }


   public function setCategory(string $category): self
   {
       $this->category = $category;

       return $this;
   }
}