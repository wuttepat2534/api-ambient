<?php

namespace App\Enums\Invoices;

enum Status: string
{
    case Pending = 'pending';
    case Paid = 'paid';
    case Canceled = 'canceled';
}
