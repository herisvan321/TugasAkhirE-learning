<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);\
        DB::table('users')->insert([
            'noinduk' => '1008036601',
            'name' => 'Ir.Hj.Nurmi,M.Kom',
            'level' => 'dosen',
            'password' => bcrypt('123456'),
            ]);
    }
}
