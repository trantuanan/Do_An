<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->truncate();
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < 10; $i++) {
            DB::table('reports')->insert([
                'name' => $faker->name,
                'noidung' => $faker->text($maxNbChars = 200),
                'mail_address' => $faker->email,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
