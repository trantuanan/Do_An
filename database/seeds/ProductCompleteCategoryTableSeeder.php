<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductCompleteCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category_products_complete')->truncate();
        $faker = Faker\Factory::create('vi_VN');

        $name = array(
            "Đèn led quảng cảo", 
            "Biển quảng cáo tấm",
            "Trang chí kiến trúc",
            "Đèn nội thất",
            "Gia công chữ quảng cáo",
            "Đèn phong cách Nhật-和風ランプ",           
        );

        for ($i = 0; $i < 6; $i++) {
            DB::table('category_products_complete')->insert([
                'name' => $name[$i],
                'mota' => $faker->text($maxNbChars = 200) ,
                'anh' => 'category-'.$i.'.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
