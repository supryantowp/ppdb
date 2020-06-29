<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
            'name' => 'Akutansi'
        ]);
        DB::table('jurusan')->insert([
            'name' => 'Pemasaran'
        ]);
        DB::table('jurusan')->insert([
            'name' => 'Administrasi Perkantoran'
        ]);
        DB::table('jurusan')->insert([
            'name' => 'Akomodasi Perhotelan'
        ]);
        DB::table('jurusan')->insert([
            'name' => 'Jasa Boga'
        ]);
        DB::table('jurusan')->insert([
            'name' => 'Multimedia'
        ]);
        DB::table('jurusan')->insert([
            'name' => 'Rekayasa Perangkat Lunak'
        ]);
    }
}
