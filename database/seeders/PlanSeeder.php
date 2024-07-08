<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::updateOrCreate(
            [
                'slug' => 'basic',
            ],
            [
                'name' => 'Basic',
                'description' => 'This is a basic plan',
                'price' => 100.00,
            ]
        );

        Plan::updateOrCreate(
            [
                'slug' => 'standard'
            ],
            [
                'name' => 'Standard',
                'description' => 'This is a standard plan',
                'price' => 200.00,
            ]
        );

        Plan::updateOrCreate(
            [
                'slug' => 'pro'
            ],
            [
                'name' => 'Pro',
                'description' => 'This is a pro plan',
                'price' => 500.00,
            ]
        );
    }
}
