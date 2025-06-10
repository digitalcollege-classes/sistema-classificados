<?php
declare(strict_types=1);

namespace App\Entity;

use DateTimeInterface;
use App\Enum\AdvertiserPlanStatusEnum;

class AdvertiserPlan
{
    private int $id;
    private int $advertiserId;
    private int $planId;
    private DateTimeInterface $startDate;
    private ?DateTimeInterface $endDate = null;
    private AdvertiserPlanStatusEnum $status;
    private DateTimeInterface $createdAt;
    private DateTimeInterface $updatedAt;

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

    public function getPlanId(): int
    {
        return $this->planId;
    }

    public function setPlanId(int $planId): void
    {
        $this->planId = $planId;
    }

    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(DateTimeInterface $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?DateTimeInterface $endDate): void
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

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function isActive(): bool
    {
        return $this->status === AdvertiserPlanStatusEnum::ACTIVE
            && (!$this->endDate || $this->endDate > new \DateTime());
    }

    public function isExpired(): bool
    {
        return $this->status === AdvertiserPlanStatusEnum::EXPIRED
            || ($this->endDate !== null && $this->endDate < new \DateTime());
    }
}