<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductCompleteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products_complete')->truncate();
        $faker = Faker\Factory::create('vi_VN');

        $anh = array(
            "san-pham-ht-1.jpg", 
            "san-pham-ht-2.jpg", 
            "san-pham-ht-3.jpg",
            "san-pham-ht-4.jpg",
            "san-pham-ht-5.jpg",
            "san-pham-ht-6.jpg",
            "san-pham-ht-7.jpg",
            "san-pham-ht-8.jpg",
            "san-pham-ht-9.jpg",
            "san-pham-ht-10.jpg",
            "san-pham-ht-11.jpg",
            "san-pham-ht-12.jpg",
            "san-pham-ht-13.jpg",
            "san-pham-ht-14.jpg",
            "san-pham-ht-15.jpg",
            "san-pham-ht-16.jpg",
            "san-pham-ht-17.jpg",
            "san-pham-ht-18.jpg",
            "san-pham-ht-19.jpg",
            "san-pham-ht-20.jpg",
            "san-pham-ht-21.jpg",
            "san-pham-ht-22.jpg",
            "san-pham-ht-23.jpg",
            "san-pham-ht-24.jpg",
            "san-pham-ht-25.jpg",
            "san-pham-ht-26.jpg",
            "san-pham-ht-27.jpg",
            "san-pham-ht-28.jpg",
            "san-pham-ht-29.jpg",
            "san-pham-ht-30.jpg",
        );
            
        $str = "SPHT001";
        for ($i = 0; $i < 30; $i++) {
            $a = $i+1;
            DB::table('products_complete')->insert([
                'maspht' => $str,
                'name' => 'Sản phẩm hoàn thiện '.$a,
                'diadiem' => $faker->address,
                'thoigian' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'mota' => $faker->text($maxNbChars = 200) ,
                'category_id' => rand(1,6),
                'users_id' => rand(1,100),
                'anh' => $anh[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $str++;
        }
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
