<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SuppliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplies')->truncate();
        $faker = Faker\Factory::create('vi_VN');
        $str = "VT001";
        for ($i = 0; $i < 20; $i++) {
            DB::table('supplies')->insert([
                'mavt' => $str,
                'ncc_id' => rand(1,20),
                'name' => 'vật tư '.$i,
                'mota' => $faker->text($maxNbChars = 200),
                'mausac' => $faker->colorName,
                'thuonghieu' => $faker->company,
                'donvi' => 'Cái',
                'dongia' => $faker->numberBetween($min = 100000, $max = 9000000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $str++;
        }
    }
}
