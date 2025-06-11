<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\AdvertiserStatusEnum;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

#[ORM\Entity]
class Advertiser
{

    #[ORM\Column(length: 100)]

    private int $id;

    private string $name;

    #[ORM\Column(length: 100)]
    private string $email;

    #[ORM\Column(length: 20)]
    private string $document;

    #[ORM\Column(length: 20)]
    private string $phone;

    #[ORM\Column(enumType: AdvertiserStatusEnum::class)]
    private AdvertiserStatusEnum $status;

    #[ORM\Column(type: "datetime")]
    private DateTime $createdAt;

    #[ORM\Column(type: "datetime")]
    private DateTime $updatedAt;


    public function __construct(
        string $name,
        string $email,
        string $document,
        string $phone
    ) {
        $this->id = Uuid::uuid4()->toString();
        $this->name = $name;
        $this->email = $email;
        $this->document = $document;
        $this->phone = $phone;
        $this->status = AdvertisementStatusEnum::INACTIVE; // Valor padrão INACTIVE
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
        $this->updateTimestamps();
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
        $this->updateTimestamps();
    }

    public function getDocument(): string
    {
        return $this->document;
    }

    public function setDocument(string $document): void
    {
        $this->document = $document;
        $this->updateTimestamps();
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
        $this->updateTimestamps();
    }

    public function getStatus(): AdvertisementStatusEnum
    {
        return $this->status;
    }

    public function isActive(): bool
    {
        return $this->status === AdvertisementStatusEnum::ACTIVE;
    }

    public function activate(): void
    {
        $this->status = AdvertisementStatusEnum::ACTIVE;
        $this->updateTimestamps();
    }

    public function deactivate(): void
    {
        $this->status = AdvertisementStatusEnum::INACTIVE;
        $this->updateTimestamps();
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    private function updateTimestamps(): void
    {
        $this->updatedAt = new DateTime();
    }
} 