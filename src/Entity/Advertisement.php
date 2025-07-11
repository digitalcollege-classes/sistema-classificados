<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\AdvertisementStatusEnum;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Advertisement
{
    #[ORM\Id] #[ORM\Column] #[ORM\GeneratedValue]
    private int $id;

    private int $advertiserId;

    #[ORM\JoinColumn(name: 'category_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: Category::class)]
    private Category $category;

    #[ORM\Column(length: 100)]
    private string $title;

    #[ORM\Column(nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $price = null;

    #[ORM\Column(type: 'string', enumType: AdvertisementStatusEnum::class)]
    private AdvertisementStatusEnum $status;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?DateTime $publishedAt = null;

    #[ORM\Column(type: 'datetime')]
    private DateTime $createdAt;

    #[ORM\Column(type: 'datetime')]
    private DateTime $updatedAt;

    public function __construct(
        string $title,
        ?string $description = null,
        ?float $price = null
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->status = AdvertisementStatusEnum::ACTIVE;
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getAdvertiserId(): int
    {
        return $this->advertiserId;
    }

    public function setAdvertiserId(int $advertiserId): void
    {
        $this->advertiserId = $advertiserId;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    public function getStatus(): AdvertisementStatusEnum
    {
        return $this->status;
    }

    public function setStatus(AdvertisementStatusEnum $status): void
    {
        $this->status = $status;
    }

    public function getPublishedAt(): ?DateTime
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?DateTime $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
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

    // Métodos de status
    public function activate(): void
    {
        $this->status = AdvertisementStatusEnum::ACTIVE;
        $this->touch();
    }

    public function pause(): void
    {
        $this->status = AdvertisementStatusEnum::PAUSED;
        $this->touch();
    }

    public function markAsSold(): void
    {
        $this->status = AdvertisementStatusEnum::SOLD;
        $this->touch();
    }

    public function markAsPublished(): void
    {
        $this->status = AdvertisementStatusEnum::PUBLISHED;
        $this->touch();
    }

    public function deactivate(): void
    {
        $this->status = AdvertisementStatusEnum::INACTIVE;
        $this->touch();
    }

    public function isActive(): bool
    {
        return AdvertisementStatusEnum::ACTIVE === $this->status;
    }

    private function touch(): void
    {
        $this->updatedAt = new DateTime();
    }
}
