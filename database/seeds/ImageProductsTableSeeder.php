<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ImageProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('image_products')->truncate();
        $faker = Faker\Factory::create('vi_VN');

        for ($i = 0; $i < 50; $i++) {
            DB::table('image_products')->insert([
                'products_id' => rand(1,10),
                'type' => '.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
