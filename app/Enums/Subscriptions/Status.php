<?php

namespace App\Enums\Subscriptions;

enum Status: string
{
    case Pending = 'pending';
    case Trial = 'trial';
    case Suspended = 'suspended';
    case Active = 'active';
    case Canceled = 'canceled';
    case Expired = 'expired';
}
