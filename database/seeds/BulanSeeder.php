<?php

use Illuminate\Database\Seeder;

class BulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bulans')->insert([
            'nama' => 'January'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'Febuary'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'March'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'April'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'May'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'June'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'July'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'August'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'September'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'October'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'November'
        ]);
        DB::table('bulans')->insert([
            'nama' => 'December'
        ]);
    }
}
