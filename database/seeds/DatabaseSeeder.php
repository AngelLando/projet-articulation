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
        $this->call(AdminsTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(FormatsTableSeeder::class);
        $this->call(PackagingTableSeeder::class);
        $this->call(FormatPackagingTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(AppellationsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PriceProductTableSeeder::class);
        $this->call(ProductTagTableSeeder::class);
        $this->call(AppellationProductTableSeeder::class);
        $this->call(ShippingCostsTableSeeder::class);
    }
}
