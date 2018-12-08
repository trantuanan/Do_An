<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WarrantyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warranty')->truncate();
        $faker = Faker\Factory::create('vi_VN');
        $str = "BH001";
        for ($i = 0; $i < 50; $i++) {
            DB::table('warranty')->insert([
                'mabh' => $str,
                'invoices_id' => rand(1,20),
                'users_id' => rand(1,100),
                'ngaybh' => Carbon::now(),
                'ngaytra' => Carbon::now(),
                'lydo' => $faker->text($maxNbChars = 200),
                'phuchi' => $faker->numberBetween($min = 100000, $max = 9000000),
                'trangthai' => rand(1,2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $str++;
        }
    }
}
