<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt(12345678)
        ]);

        User::create([
            'name'  => 'calon',
            'email' => 'calon@gmail.com',
            'password' => bcrypt('calon123')
        ]);
    }
}
