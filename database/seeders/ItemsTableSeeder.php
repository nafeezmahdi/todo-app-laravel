<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'owner_id' => 1,
                'name' => 'Pick up milk',
                'done' => false,
            ],
            [
                'owner_id' => 1,
                'name' => 'Walk the dogs',
                'done' => true,
            ],
            [
                'owner_id' => 1,
                'name' => 'Cook dinner',
                'done' => false,
            ],
        ]);
    }
}