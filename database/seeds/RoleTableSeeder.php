<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
        	[
        		'name' => 'adminstrator',
        		'display_name' => 'Adminstrator',
        		'description' => 'User is allowed to manage everything'
        	],
        	[
        		'name' => 'manager',
        		'display_name' => 'Manager',
        		'description' => 'User is allowed to manage read, create, edit and delete products.'
        	],
        	[
        		'name' => 'staff',
        		'display_name' => 'Staff',
        		'description' => 'User is allowed to manage read, create and edit products.'
        	],
        	[
        		'name' => 'subscriber',
        		'display_name' => 'Subscriber',
        		'description' => 'User is allowed to read products.'
        	]        	        	        	
        ];

        foreach ($roles as $key => $value) {
        	Role::create($value);
        }
    }
}
