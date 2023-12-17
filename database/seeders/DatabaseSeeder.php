<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(MerchandiseSeeder::class);
        $this->call(PurchaseSeeder::class);
        $this->call(PurchasedItemSeeder::class);
        $this->call(SaleSeeder::class);
        $this->call(SoldItemSeeder::class);
    }
}
