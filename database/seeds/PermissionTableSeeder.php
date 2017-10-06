<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
			[
			   'name' => 'role-read',
			   'display_name' => 'Can read',
			   'description' => 'Can read the document'
			],
			[
				'name' => 'role-create',
				'display_name' => 'Can create',
				'description' => 'Can create the document'
			],
			[
			   'name' => 'role-edit',
			   'display_name' => 'Can edit',
			   'description' => 'Can edit the document'
			],
			[
				'name' => 'role-delete',
				'display_name' => 'Can delete',
				'description' => 'Can delete the document'
			]
        ];

        foreach ($permissions as $key => $value) {
        	Permission::create($value);
        }
    }
}
