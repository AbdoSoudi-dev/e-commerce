<?php

namespace App\Enums;

Enum ProductStatus : string
{
    case Active = 'active';
    case Draft = 'draft';
    case Archived = 'archived';
}
