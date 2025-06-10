<?php
declare(strict_types=1);

namespace App\Entity;

use DateTime;
use App\Enum\AdvertisementStatusEnum;

class Advertisement
{
    private int $id;
    private int $advertiserId;
    private int $categoryId;
    private string $title;
    private ?string $description = null;
    private ?float $price = null;
    private AdvertisementStatusEnum $status;
    private ?DateTime $publishedAt = null;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(
        int $advertiserId,
        int $categoryId,
        string $title,
        ?string $description = null,
        ?float $price = null
    ) {
        $this->advertiserId = $advertiserId;
        $this->categoryId = $categoryId;
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

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
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
        return $this->status === AdvertisementStatusEnum::ACTIVE;
    }

    private function touch(): void
    {
        $this->updatedAt = new DateTime();
    }
}