<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        $faker = Faker\Factory::create('vi_VN');

        DB::table('users')->insert([
            'mail_address' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'name' => 'Trần Tuấn Anh',
            'address' => 'Hateco,Hoàng Mai, Hà Nội',
            'phone' => '0967193281',
            'gioitinh' => 1,
            'anh' => 'default_avatar.jpg',
            'ngaysinh' => '1996-09-13',
            'cmnd' => '0967193281',
            'role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'mail_address' => $faker->unique()->email,
                'password' => bcrypt('123456'),
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => $faker->e164PhoneNumber(14),
                'gioitinh' => rand(1,2),
                'anh' => 'default_avatar.jpg',
                'ngaysinh' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'cmnd' => str_shuffle('0123456789'),
                'role_id' => rand(2,10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
