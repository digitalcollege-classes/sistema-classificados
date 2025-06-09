<?php

declare(strict_types=1);

namespace App\Enum;

enum AdvertiserPlanStatusEnum: string
{
    case ACTIVE = 'ACTIVE';
    case EXPIRED = 'EXPIRED';
    case CANCELED = 'CANCELED';
}