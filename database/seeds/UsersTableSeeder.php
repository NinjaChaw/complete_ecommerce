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
        App\User::create([
            'name'=>'Dev Boy',
            'email'=>'dev@mail.com',
            'password'=>bcrypt('123123')
        ]);
    }
}
