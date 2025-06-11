<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Example
{
    #[ORM\Id] #[ORM\Column] #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $name;

    #[ORM\Column]
    private bool $status = false;

    
    public function getName(): string
    {
        return $this->name;
    }
    
  
    public function setName(string $name): string
    {
        $this->name = $name;
    }
}