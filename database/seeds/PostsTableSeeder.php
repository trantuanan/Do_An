<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('posts')->truncate();
        $faker = Faker\Factory::create('vi_VN');


        $anh = array(
            "tintuc-1.jpg", 
            "tintuc-2.jpg", 
            "tintuc-3.jpg",
            "tintuc-4.jpg",
            "tintuc-5.jpg",
            "tintuc-6.jpg",
            "tintuc-7.jpg",
            "tintuc-8.jpg",
            "tintuc-9.jpg",
            "tintuc-10.jpg",
            "tintuc-11.jpg",
            "tintuc-12.jpg",
        );
        $str = "TT001";
        for ($i = 0; $i < 12; $i++) {
            $a = $i+1;
            DB::table('posts')->insert([
                'matt' => $str,
                'title' => 'Tin tức thứ '.$a,
                'mota' => $faker->text($maxNbChars = 200) ,
                'noidung' => $faker->randomHtml(2,3),
                'category_id' => rand(1,4),
                'users_id' => rand(1,100),
                'anh' => $anh[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $str++;
        }
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
