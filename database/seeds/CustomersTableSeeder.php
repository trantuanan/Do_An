<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->truncate();
        $faker = Faker\Factory::create('vi_VN');
        $str = "KH001";
        for ($i = 0; $i < 50; $i++) {
            DB::table('customers')->insert([
                'makh' => $str,
                'mail_address' => $faker->unique()->email,
                'password' => bcrypt('123456'),
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => $faker->e164PhoneNumber(14),
                'gioitinh' => rand(1,2),
                'ngaysinh' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $str++;
        }
    }
}
