<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DesignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designs')->truncate();
        $faker = Faker\Factory::create('vi_VN');
        $str = "TK001";
        for ($i = 0; $i < 50; $i++) {
            DB::table('designs')->insert([
                'matk' => $str,
                'type' => '.jpg',
                'mota' => $faker->text($maxNbChars = 200),
                'size' => rand(1,3000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $str++;
        }
    }
}
