<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->truncate();
        $faker = Faker\Factory::create('vi_VN');

        DB::table('role')->insert([
            'TenPQ' => 'Quản trị hệ thống',
            'Q1_1' => 1,
            'Q1_2' => 1,
            'Q1_3' => 1,
            'Q1_4' => 1,
            'Q2_1' => 1,
            'Q2_2' => 1,
            'Q2_3' => 1,
            'Q2_4' => 1,
            'Q2_5' => 1,
            'Q3_1' => 1,
            'Q3_2' => 1,
            'Q3_3' => 1,
            'Q3_4' => 1,
            'Q4_1' => 1,
            'Q4_2' => 1,
            'Q4_3' => 1,
            'Q4_4' => 1,
            'Q4_5' => 1,
            'Q5_1' => 1,
            'Q5_2' => 1,
            'Q5_3' => 1,
            'Q6_1' => 1,
            'Q6_2' => 1,
            'Q6_3' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $name = array(
            "Nhân viên bán hàng", 
            "Nhân viên thủ kho", 
            "Nhân viên kế toán",
            "Nhân viên marketing",
            "Nhân viên thiết kế",
            "Nhân viên sản xuất",
        );

        for ($i = 0; $i < 5; $i++) {
            DB::table('role')->insert([
                'TenPQ' => $name[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
