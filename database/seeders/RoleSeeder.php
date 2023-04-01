<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Role::where('name', 'admin')->exists()) {
            // Create the role if it doesn't exist
            Role::create(['name' => 'admin', 'guard_name' => 'web']);
        }
    }
}