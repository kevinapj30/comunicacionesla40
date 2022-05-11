<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'rol' => 'Admin',
            'acceso' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:m:s'),
        ]);

        DB::table('roles')->insert([
            'rol' => 'Tecnico',
            'acceso' => 1,
            'create' => 1,
            'edit' => 1,
            'delete' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:m:s'),
        ]);

        DB::table('roles')->insert([
            'rol' => 'Cliente',
            'acceso' => 1,
            'create' => 0,
            'edit' => 0,
            'delete' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:m:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:m:s'),
        ]);
    }
}
