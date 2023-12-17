<?php

namespace Database\Seeders;

use App\Models\Sold_Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoldItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sold_Item::factory(20)->create();
    }
}
