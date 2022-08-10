<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\AdminModel;
use App\Models\Admin\RoleModel;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('tbl_role')->insert([
            'name' => 'Admin',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
        DB::table('tbl_admin')->insert([
            'name' => 'Admin',
            'id_role' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'phone' => '0975041697',
            'path_image' => 'uploads\images\admin\adminDefautl.png',
            'id_city' => '34',
            'id_district' => '339',
            'id_ward' => '02140',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
