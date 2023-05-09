<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'password2' => 'admin',
            'nama' => 'Zaenudin Samsul',
            'telp' => '085333334444',
            'status' => 'admin',
        ]);
        DB::table('users')->insert([
            'username' => 'gemoy',
            'password' => bcrypt('gemoy'),
            'password2' => 'gemoy',
            'nama' => 'Ucup Salahudin',
            'telp' => '085333334444',
            'status' => 'penonton',
        ]);

        DB::table('tb_daftar_konser')->insert([
            'ID' => Str::random(5),
            'nama' => 'Junaedi Samsul',
            'telp' => '085333334444',
            'id_user' => 2,
            'ket' => 'belum',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('tb_daftar_konser')->insert([
            'ID' => Str::random(5),
            'nama' => 'Ucup Shalahudin',
            'telp' => '085333334444',
            'id_user' => 1,
            'ket' => 'belum',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
