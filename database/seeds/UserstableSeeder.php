<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        [
            'name'=>'Lê Công Anh ',
            'email'=>'mam@gmail.com',
            'password'=> bcrypt('Mam1997'),
            'role'=> 1,
            'avatar'=>'avatar.jpg',
        ]);
    }
}
