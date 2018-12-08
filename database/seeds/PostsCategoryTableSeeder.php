<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('category_posts')->truncate();
        $faker = Faker\Factory::create('vi_VN');

        $name = array(
            "Tin tức chung", 
            "Tin tức quảng cáo", 
            "Tin tức nổi bật",
            "Tin Siêu Led Việt",
        );

        for ($i = 0; $i < 3; $i++) {
            DB::table('category_posts')->insert([
                'name' => $name[$i],
                'mota' => $faker->text($maxNbChars = 200) ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
