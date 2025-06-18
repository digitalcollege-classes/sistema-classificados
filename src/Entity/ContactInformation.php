<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use DateTime;

#[ORM\Entity]
class ContactInformation
{
        #[ORM\Id] #[ORM\Column] #[ORM\GeneratedValue]
    private int $id;

        #[ORM\Column(length: 15, nullable: true)]
    private ?string $phone;

        #[ORM\Column(length: 50, nullable: true)]
    private ?string $email;

        #[ORM\Column(length: 100, nullable: true)]
    private ?string $socialMedia;

    #[ORM\Column]
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

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSocialMedia(): string
    {
        return $this->socialMedia;
    }

    public function setSocialMedia(string $socialMedia): void
    {
        $this->name = $socialMedia;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
