<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InvoiceDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices_details')->truncate();
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < 50; $i++) {
            DB::table('invoices_details')->insert([
                'invoices_id' => rand(1,20),
                'product_id' => rand(1,50),
                'soluong' => rand(1,6),
                'dongia' => $faker->numberBetween($min = 100000, $max = 9000000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
