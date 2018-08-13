<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
