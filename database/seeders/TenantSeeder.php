<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = [
            [
                'name' => 'Tenant One',
                'plan_id' => 1,
                'users' => [
                    [
                        'name' => 'User One',
                        'email' => '12345@gmail.com',
                        'password' => '12345678',
                    ],
                    [
                        'name' => 'User Two',
                        'email' => '12346@gmail.com',
                        'password' => '12345678',
                    ],
                ],
            ],
            [
                'name' => 'Tenant Two',
                'plan_id' => 2,
                'users' => [
                    [
                        'name' => 'User One',
                        'email' => '12347@gmail.com',
                        'password' => '12345678',
                    ],
                    [
                        'name' => 'User Two',
                        'email' => '1234568@hotmail.com',
                        'password' => '12345678',
                    ],
                ],
            ],
        ];

        foreach ($tenants as $tenant) {
            $users = $tenant['users'];
            unset($tenant['users']);

            $tenant = Tenant::create($tenant);
            $tenant->users()->createMany($users);
        }
    }
}
