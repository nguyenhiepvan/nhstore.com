<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ReceiptsTableSeeder::class);
        $this->call(CollectionsTableSeeder::class);
    }
}
