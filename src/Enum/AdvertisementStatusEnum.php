<?php

declare(strict_types=1);

namespace App\Enum;

enum AdvertisementStatusEnum: string
{
    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
    case PAUSED = 'PAUSED';
    case SOLD = 'SOLD';
    case DRAFT = 'DRAFT';
    case EXPIRED = 'EXPIRED';
}
