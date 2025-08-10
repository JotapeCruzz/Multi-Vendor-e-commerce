<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make("123456");
        // $admin = new Admin;
        // $admin->name = 'João Pedro';
        // $admin->role = 'admin';
        // $admin->mobile = '15981079804';
        // $admin->email = 'admin@admin.com';
        // $admin->password = $password;
        // $admin->status = 1;
        // $admin->save();

        $admin = new Admin;
        $admin->name = 'Sub Admin 1';
        $admin->role = 'subadmin';
        $admin->mobile = '00000000000';
        $admin->email = 'Sub.Admin1@admin.com';
        $admin->password = $password;
        $admin->status = 1;
        $admin->save();

        $admin = new Admin;
        $admin->name = 'Sub Admin 2';
        $admin->role = 'subadmin';
        $admin->mobile = '00000000000';
        $admin->email = 'Sub.Admin2@admin.com';
        $admin->password = $password;
        $admin->status = 1;
        $admin->save();

    }
}
