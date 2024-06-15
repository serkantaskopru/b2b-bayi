<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Tenant::create([
            'name' => 'Tenant 1',
            'domain' => 'tenant1.laravel.test',
            'database' => 'tenant1_database',
            'uid' => Str::random(16)
        ]);
        Tenant::create([
            'name' => 'Tenant 2',
            'domain' => 'tenant2.laravel.test',
            'database' => 'tenant2_database',
            'uid' => Str::random(16)
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    }
}
