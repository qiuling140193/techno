<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
        [
         'id_user' => 'A0001',
         'name' => 'admin', 
         'email' => 'admin@admin.com',
         'password' => bcrypt('admin'),
         'level' => 1
        ],
        [
         'id_user' => 'G0001',
         'name' => 'guru', 
         'email' => 'guru@admin.com',
         'password' => bcrypt('guru'),
         'level' => 2
        ],
        [
         'id_user' => 'M0001',
         'name' => 'murid', 
         'email' => 'murid@admin.com',
         'password' => bcrypt('kasir'),
         'level' => 0
        ]
      ));
    }
}
