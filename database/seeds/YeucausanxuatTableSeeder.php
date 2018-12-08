<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class YeucausanxuatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('yeucausanxuat')->truncate();
        $faker = Faker\Factory::create('vi_VN');
        $str = "YCSX001";
        for ($i = 0; $i < 20; $i++) {
            DB::table('yeucausanxuat')->insert([
                'maycsx' => $str,
            	'users_id' => rand(1,50),
                'bill_id' => rand(1,20),
                'name' => 'yêu cầu sản xuất'.$i,
                'ngayhen' => Carbon::now(),
                'ngaytra' => Carbon::now(),
                'trangthai' => rand(1,2),
                'mota' => $faker->text($maxNbChars = 200) ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $str++;
        }
    }
}
