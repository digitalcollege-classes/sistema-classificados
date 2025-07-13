<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\AdvertiserPlanStatusEnum;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\HasLifecycleCallbacks]
class AdvertiserPlan
{
    #[ORM\Id] #[ORM\Column] #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column]
    private int $advertiserId;

    #[ORM\Column]
    private string $name;

    #[ORM\Column]
    private DateTime $startDate;

    #[ORM\Column(nullable: true)]
    private ?DateTime $endDate = null;

    #[ORM\Column(length: 15)]
    private AdvertiserPlanStatusEnum $status;

    #[ORM\Column]
    private DateTime $createdAt;

    #[ORM\Column]
    private DateTime $updatedAt;

    #[ORM\PreUpdate]
    public function preUpdate(): void
    {
        $this->updatedAt = new DateTime();
    }

    #[ORM\PrePersist]
    public function prePersist(): void
    {
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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): ?DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(?DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function getStatus(): AdvertiserPlanStatusEnum
    {
        return $this->status;
    }

    public function setStatus(AdvertiserPlanStatusEnum $status): void
    {
        $this->status = $status;
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

    public function isActive(): bool
    {
        return AdvertiserPlanStatusEnum::ACTIVE === $this->status
            && (!$this->endDate || $this->endDate > new DateTime());
    }

    public function isExpired(): bool
    {
        return AdvertiserPlanStatusEnum::EXPIRED === $this->status
            || (null !== $this->endDate && $this->endDate < new DateTime());
    }
}
