<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NCCTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhacungcap')->truncate();
        $faker = Faker\Factory::create('vi_VN');
        $str = "NCC001";
        for ($i = 0; $i < 20; $i++) {
            DB::table('nhacungcap')->insert([
                'mancc' => $str,
                'name' => $faker->name,
                'address' => $faker->address,
                'mail_address' => $faker->unique()->email,
                'phone' => $faker->e164PhoneNumber(14),
                'mota' => $faker->text($maxNbChars = 200),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $str++;
        }
    }
}
