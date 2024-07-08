<?php

namespace App\Services\Transactions;

use App\Models\Transaction;

class NormalTransactionsService
{
    public function execute($start_date, $end_date)
    {
        $transactions = Transaction::where(function ($query) use ($start_date, $end_date) {
            $query->whereNull('recurrence')
                ->whereBetween('due_date', [$start_date, $end_date]);
        })->orWhere(function ($query) use ($start_date, $end_date) {
            $query->whereNotNull('installment_number')
                ->whereBetween('due_date', [$start_date, $end_date]);
        })->get();

        return $transactions;
    }
}
