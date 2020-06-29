<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
        ]);
        Role::create([
            'name' => 'petugas',
        ]);
        Role::create([
            'name' => 'calon-siswa',
        ]);
        Role::create([
            'name' => 'siswa',
        ]);
        Role::create([
            'name' => 'guru',
        ]);
    }
}
