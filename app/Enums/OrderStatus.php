<?php

namespace App\Enums;

enum OrderStatus : string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Shipped = 'shipped';
    case Received = 'received';
    case Cancelled = 'cancelled';
    case Refunded = 'refunded';
}
