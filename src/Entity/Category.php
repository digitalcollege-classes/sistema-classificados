<?php

declare(strict_types=1);


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Category
{
    #[ORM\Id] #[ORM\Column] #[ORM\GeneratedValue]
    private  int $id;

    #[ORM\Column(length: 25, nullable: true)]
    private string $name;

    private string $description;

    private DateTime $createdAt;

    private DateTime $updatedAt;

   
}



