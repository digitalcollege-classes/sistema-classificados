<?php

declare(strict_types=1);

namespace App\Enum;

enum AdvertisementStatusEnum: string
{
    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
    case DRAFT = 'DRAFT';
    case PUBLISHED = 'PUBLISHED';
    case PAUSED = 'PAUSED';
    case TRASH = 'TRASH';
}