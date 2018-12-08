<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class YeucausanxuatDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('yeucausanxuat_details')->truncate();
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < 20; $i++) {
            DB::table('yeucausanxuat_details')->insert([
            	'design_id' => rand(1,50),
            	'product_id' => rand(1,50),
            	'ycsx_id' => rand(1,20),
                'soluong' => rand(1,6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
