<?php

namespace App\Services\Transactions;

use App\Models\Transaction;
use Carbon\Carbon;

class RecurringTransactionsService
{
    public function execute($start_date, $end_date)
    {
        $recurring = Transaction::whereNotNull('recurrence')
            ->whereNull('installment_number')
            ->get();

        $data = collect();
        foreach ($recurring as $transaction) {
            $due_date = Carbon::parse($transaction->due_date);
            $current_date = Carbon::parse($start_date)->copy();
            while ($current_date <= $end_date) {
                $recurring_transaction = $transaction->replicate();
                $recurring_transaction->due_date = $due_date->copy()->day($due_date->day)->month($current_date->month)->year($current_date->year);
                $data->push($recurring_transaction);

                $current_date->addMonth();
            }
        };

        return $data;
    }
}
