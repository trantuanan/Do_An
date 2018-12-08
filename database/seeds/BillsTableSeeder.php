<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->truncate();
        $faker = Faker\Factory::create('vi_VN');
        $str = "DH001";
        for ($i = 0; $i < 20; $i++) {
            DB::table('bills')->insert([
                'madh' => $str,
                'customer_id' => rand(1,10),
                'trangthai' => rand(1,2),
                'tiendo' => rand(1,5),
                'mota' => $faker->text($maxNbChars = 200) ,
                'ngayht' => Carbon::now(),
                'ngaytra' => Carbon::now(),
                'address' => $faker->address,
                'phone' => $faker->e164PhoneNumber(14),
                'thanhtien' => $faker->numberBetween($min = 100000, $max = 9000000),
                'thue' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $str++;
        }
    }
}
