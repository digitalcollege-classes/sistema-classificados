<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\AdvertiserPlan;
use App\Enum\AdvertiserPlanStatusEnum;
use DateTime;
use Doctrine\ORM\EntityRepository;
use InvalidArgumentException;

class AdvertiserPlanService extends AbstractService
{
    private readonly EntityRepository $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = $this->entityManager->getRepository(AdvertiserPlan::class);
    }

    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    public function findBy(array $criteria): array
    {
        return $this->repository->findBy($criteria);
    }

    public function find(int $id): AdvertiserPlan
    {
        $plan = $this->repository->find($id);

        if (!$plan) {
            throw new InvalidArgumentException('Plano não encontrado');
        }

        return $plan;
    }

    public function update(AdvertiserPlan $advertiserPlan): AdvertiserPlan
    {
        $this->entityManager->persist($advertiserPlan);
        $this->entityManager->flush();

        return $advertiserPlan;
    }

    public function remove(int $id): void
    {
        $plan = $this->find($id);
        $this->entityManager->remove($plan);
        $this->entityManager->flush();
    }

    public function create(AdvertiserPlan $advertiserPlan): void
    {
        $this->entityManager->persist($advertiserPlan);
        $this->entityManager->flush();
    }

    public function createFromForm(array $data): void
    {
        $plan = new AdvertiserPlan();
        $plan->setAdvertiserId(random_int(1, 1000));
        $plan->setName(trim($data['name']));
        $plan->setStartDate(new DateTime($data['startDate']));
        $plan->setStatus(AdvertiserPlanStatusEnum::from($data['status']));
        $plan->setEndDate(!empty($data['endDate']) ? new DateTime($data['endDate']) : null);

        $this->entityManager->persist($plan);
        $this->entityManager->flush();
    }
}
