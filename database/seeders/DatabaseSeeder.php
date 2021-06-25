<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersSeeder::class);
        $this->call(SuppliersSeeder::class);
        $this->call(ManufacturersSeeder::class);
        $this->call(AsAttributesSeeder::class);
        $this->call(AsAttributeOptionsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(GroupImagesSeeder::class);
        $this->call(GroupProductsSeeder::class);
        $this->call(ShopImagesSeeder::class);
    }
}
