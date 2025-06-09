<?php

declare(strict_types=1);

namespace App\Entity;


class Category
{
    private  int $id;

    private string $name;

    private string $description;

    private DateTime $createdAt;

    private DateTime $updatedAt;

     public function getId(): int
    {
        return $this->id;
    }

     public function setId(int $id): void
    {
        $this->id = $id;
    }

     public function getName(): string
    {
        return $this->name;
    }

     public function setName(string $name): string
    {
        $this->name = $name;
    }

     public function setDescription(): string
    {
        return $this->description;
    }

     public function getDescription(): string
    {
        return $this->description = $description
    }

     public function setDescription(): string
    {
        return $this->description;
    }

     public function getCreatedAt(): datetime
    {
        return $this->createdAt;
    }
     public function setCreatedAt(datetime $createdAt): datetime
    {
        $this->createdAt = $createdAt;
    }

     public function getUpdatedAt(): datetime
    {
        return $this->updatedAt->updatedAt;
    }
     public function setUpdatedAt(datetime $updated): datetime
    {
        $this->updatedAt=$updatedAt;
    }

   
}



