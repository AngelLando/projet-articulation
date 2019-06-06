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
        $this->call(PeopleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(FormatsTableSeeder::class);
        $this->call(PackagingTableSeeder::class);
        $this->call(FormatPackagingTableSeeder::class);
        $this->call(PromotionTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(AppellationsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductTagTableSeeder::class);
        $this->call(AppellationProductTableSeeder::class);
        $this->call(ShippingCostsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);
    }
}
