<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    private int $id;
    private int $userId;
    private int $advertisementId;
    private int $rating;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTime $createdAt = null;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTime $updatedAt = null;

    public function getId(): int 
    { 
        return $this->id; 
    }

    public function setId(int $id): void 
    { 
        $this->id = $id; 
    }

    public function getUserId(): int 
    { 
        return $this->userId; 
    }

    public function setUserId(int $userId): void 
    { 
        $this->userId = $userId; 
    }

    public function getAdvertisementId(): int 
    { 
        return $this->advertisementId; 
    }

    public function setAdvertisementId(int $advertisementId): void 
    { 
        $this->advertisementId = $advertisementId; 
    }

    public function getRating(): int 
    { 
        return $this->rating; 
    }

    public function setRating(int $rating): void 
    {
        if ($rating < 1 || $rating > 5) {
            throw new \InvalidArgumentException('Rating deve ser entre 1 e 5');
        }
        $this->rating = $rating;
    }

    public function getComment(): string 
    { 
        return $this->comment; 
    }

    public function setComment(string $comment): void 
    { 
        $this->comment = $comment; 
    }

    public function getCreatedAt(): ?\DateTime 
    { 
        return $this->createdAt; 
    }
    
    public function setCreatedAt(\DateTime $createdAt): void 
    { 
        $this->createdAt = $createdAt; 
    }

    public function getUpdatedAt(): \DateTime 
    { 
        return $this->updatedAt; 
    }

    public function setUpdatedAt(\DateTime $updatedAt): void 
    { 
        $this->updatedAt = $updatedAt; 
    }
}