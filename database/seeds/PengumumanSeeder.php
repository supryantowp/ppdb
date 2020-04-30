<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 1000; $i++) {
            DB::table('pengumuman_ppdb')->insert([
                'no_ppdb' => '#0002',
                'status' => 'diterima'
            ]);
        }
        for ($i = 0; $i <= 1000; $i++) {
            DB::table('pengumuman_ppdb')->insert([
                'no_ppdb' => '#0002',
                'status' => 'belum di verifikasi'
            ]);
        }
        for ($i = 0; $i <= 1000; $i++) {
            DB::table('pengumuman_ppdb')->insert([
                'no_ppdb' => '#0004',
                'status' => 'tidak diterima'
            ]);
        }
    }
}
