<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([

        		'name'		=>	'Roxana Guillen',
        		'email'		=>	'roxana@gmail.com',
        		'password'	=>	bcrypt('123456'),
        		'type'		=>	'admin'
        	]);*/
        factory(prueba_laravel\User::class,50)->create();
    }
}
