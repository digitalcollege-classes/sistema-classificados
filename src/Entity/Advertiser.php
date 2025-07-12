<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\AdvertiserStatusEnum;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Advertiser
{
    #[ORM\Id] #[ORM\GeneratedValue] #[ORM\Column]
    private int $id;

    #[ORM\Column(type: 'string', length: 100)]
    private string $name;

    #[ORM\Column(length: 100, unique: true)]
    private string $email;

    #[ORM\Column]
    private string $password;

    #[ORM\Column(length: 20)]
    private string $document;

    #[ORM\Column(length: 20)]
    private string $phone;

    #[ORM\Column(enumType: AdvertiserStatusEnum::class)]
    private AdvertiserStatusEnum $status;

    #[ORM\Column(type: 'datetime')]
    private DateTime $createdAt;

    #[ORM\Column(type: 'datetime')]
    private DateTime $updatedAt;

    public function __construct(
        string $name,
        string $email,
        string $document,
        string $phone
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->document = $document;
        $this->phone = $phone;
        $this->status = AdvertiserStatusEnum::INACTIVE;
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    public function getId(): int
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

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getStatus(): AdvertiserStatusEnum
    {
        return $this->status;
    }

    public function setStatus(AdvertiserStatusEnum $status): void
    {
        $this->status = $status;
    }

    public function isActive(): bool
    {
        return AdvertiserStatusEnum::ACTIVE === $this->status;
    }

    public function activate(): void
    {
        $this->status = AdvertiserStatusEnum::ACTIVE;
        $this->updateTimestamps();
    }

    public function deactivate(): void
    {
        $this->status = AdvertiserStatusEnum::INACTIVE;
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

    public function setUpdatedAt(DateTime $datetime): void
    {
        $this->updatedAt = $datetime;
    }

    public function setCreatedAt(DateTime $datetime): void
    {
        $this->createdAt = $datetime;
    }

    public function getShortName(): string
    {
        $partes = preg_split('/\s+/', trim($this->name));
        $primeiro = $partes[0] ?? '';
        $ultimo = count($partes) > 1 ? $partes[count($partes) - 1] : '';

        return trim($primeiro.' '.$ultimo);
    }

    private function updateTimestamps(): void
    {
        $this->updatedAt = new DateTime();
    }
}
