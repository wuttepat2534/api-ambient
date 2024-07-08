<?php

namespace App\Enums\Subscriptions;

enum Period: string
{
    case Monthly = 'monthly';
    case Quarterly = 'quarterly';
    case Yearly = 'yearly';
}
