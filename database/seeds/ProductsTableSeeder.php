<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        $faker = Faker\Factory::create('vi_VN');
        $str = "SPD001";
        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'masp' => $str,
                'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'size' => rand(1,10).' m x '.rand(1,10).' m x '.rand(1,10).' m',
                'vatlieu' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'mota' => $faker->text($maxNbChars = 200) ,
                'baohanh' => rand(1,6),
                'trangthai' => rand(1,2),
                'dongia' => $faker->numberBetween($min = 100000, $max = 9000000),
                'category_id' => rand(1,5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $str++;
        }
    }
}
