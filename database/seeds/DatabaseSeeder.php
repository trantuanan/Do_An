<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(PostsCategoryTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(ProductCompleteCategoryTableSeeder::class);
        $this->call(ProductCompleteTableSeeder::class);
        $this->call(ImageProductsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(BillsTableSeeder::class);
        $this->call(DesignsTableSeeder::class);
        $this->call(BillsDetailsTableSeeder::class);
        $this->call(WarrantyTableSeeder::class);
        $this->call(InvoiceTableSeeder::class);
        $this->call(InvoiceDetailsTableSeeder::class);
        $this->call(YeucausanxuatTableSeeder::class);
        $this->call(YeucausanxuatDetailsTableSeeder::class);
        $this->call(NCCTableSeeder::class);
        $this->call(SuppliesTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();
    }
}
