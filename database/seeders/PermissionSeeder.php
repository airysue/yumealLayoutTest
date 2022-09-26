<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissons = [
            [
                'name' => 'CheckController@index',
                'display_name' => 'Index',
                'description' => 'Check index'
            ],
            [
                'name' => 'CheckController@create',
                'display_name' => 'Create',
                'description' => 'Check create'
            ],
            [
                'name' => 'CheckController@delete',
                'display_name' => 'Delete',
                'description' => 'Check delete'
            ],
            [
                'name' => 'CheckController@update',
                'display_name' => 'Update',
                'description' => 'Check update'
            ],
        ];

        foreach ($permissons as $key => $value) {

            $permission = Permission::create([
                            'name' => $value['name'],
                            'display_name' => $value['display_name'],
                            'description' => $value['description']
                        ]);

            User::first()->attachPermission($permission);
        }
    }
}
