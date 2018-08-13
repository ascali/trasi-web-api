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

        // $this->call('UsersTableSeeder');
    	$hasher = app()->make('hash');
        // $password = $hasher->make($request->input('password'));
        $date = date('Y-m-d H:i:s');
    	$username = str_random(5);

        /* Role Seeder*/
        DB::table('roles')->insert([
        	'role_id' => 1,
        	'rolename' => 'Administrator',
        	'created_by' => $username,
        	'updated_by' => $username,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('roles')->insert([
        	'role_id' => 2,
			'rolename' => 'Police',
			'created_by' => $username,
			'updated_by' => $username,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        DB::table('roles')->insert([
        	'role_id' => 3,
			'rolename' => 'User Netizen',
			'created_by' => $username,
			'updated_by' => $username,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        /* User Seeder*/
    	$email = str_random(5);
    	$nik = rand();
        DB::table('users')->insert([
        	'nik' => $nik,
            'username' => $username,
            'longname' => $username,
            'activation' => 1,
            'email' => 'admin@trasi.com',
            'password' => $hasher->make('admin'),
            'gender' => 1,
            'pob' => 'Indramayu',
            'dob' => '1990-'.date("m-d"),
            'phone' => (int)'08997322111',
            'role_id' => 1,
            'created_by' => $username,
            'updated_by' => $username,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

    	$username1 = str_random(5);
    	$email1 = str_random(5);
    	$nik1 = rand();
        DB::table('users')->insert([
        	'nik' => $nik1,
            'username' => $username1,
            'longname' => $username1,
            'activation' => 1,
            'email' => $email1.'@trasi.com',
            'password' => $hasher->make('123456789'),
            'gender' => 1,
            'pob' => 'Indramayu',
            'dob' => '1990-'.date("m-d"),
            'phone' => (int)'08997322111',
            'role_id' => 2,
            'created_by' => $username,
            'updated_by' => $username,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

    	$username2 = str_random(5);
    	$email2 = str_random(5);
    	$nik2 = rand();
        DB::table('users')->insert([
        	'nik' => $nik2,
            'username' => $username2,
            'longname' => $username2,
            'activation' => 1,
            'email' => $email2.'@gmail.com',
            'password' => $hasher->make('123456789'),
            'gender' => 1,
            'pob' => 'Indramayu',
            'dob' => '1990-'.date("m-d"),
            'phone' => (int)'08997322111',
            'role_id' => 3,
            'created_by' => $username,
            'updated_by' => $username,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
