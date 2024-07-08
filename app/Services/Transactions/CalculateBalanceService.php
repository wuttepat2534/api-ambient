<?php

namespace App\Services\Transactions;

use Illuminate\Database\Eloquent\Collection;

class CalculateBalanceService
{
    public function execute(Collection $transactions)
    {
        $total_in = $transactions->where('type', 'income')->sum('amount');
        $total_out = $transactions->where('type', 'expense')->sum('amount');
        $total = $total_in - $total_out;

        return [
            'total_in' => $total_in,
            'total_out' => $total_out,
            'total' => $total,
        ];
    }
}
