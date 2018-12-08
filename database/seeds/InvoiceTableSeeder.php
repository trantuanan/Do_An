<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->truncate();
        $faker = Faker\Factory::create('vi_VN');
        $str = "HD001";
        for ($i = 0; $i < 20; $i++) {
            DB::table('invoices')->insert([
                'mahd' => $str,
                'customer_id' => rand(1,10),
                'bill_id' => rand(1,10),
                'users_id' => rand(1,10),
                'trangthai' => rand(1,2),
                'mota' => $faker->text($maxNbChars = 200),
                'thanhtien' => $faker->numberBetween($min = 100000, $max = 9000000),
                'thanhtoan' => $faker->numberBetween($min = 100000, $max = 9000000),
                'giamtru' => $faker->numberBetween($min = 100000, $max = 9000000),
                'thue' => 10,
                'loaitt' => rand(1,2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $str++;
        }
    }
}
