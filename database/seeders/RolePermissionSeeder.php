<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private $permissions = [
        'dashboard' => [
            'view',
        ],

        'user' => [
            'view',
            'create',
            'update',
            'delete'
        ],

        'relawan' => [
            'view',
            'create',
            'update',
            'delete'
        ],

        'desa' => [
            'view',
            'create',
            'update',
            'delete'
        ],

        'lokasi' => [
            'view',
            'create',
            'update',
            'delete'
        ],

        'status-lokasi' => [
            'view',
            'create',
            'update',
            'delete'
        ],
        'sphere-lokasi' => [
            'view',
            'create',
            'update',
            'delete'
        ],

        'riwayat-pengungsi' => [
            'view',
            'create',
            'update',
            'delete'
        ],

        'sphere-pengungsi' => [
            'view',
            'create',
            'update',
            'delete'
        ],
    ];

    public function run(): void
    {
        foreach ($this->permissions as $key => $value){
            foreach($value as $permission){
                Permission::firstOrCreate([
                    'name' => $key . '-' . $permission,
                ]);
            }
        }

        Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web'
        ])->givePermissionTo(Permission::all());

        Role::firstOrCreate([
            'name' => 'relawan',
            'guard_name' => 'web'
        ])->givePermissionTo([
            'desa-view',
            
            'lokasi-view',
            'lokasi-create',
            'lokasi-update',
            'lokasi-delete',
    
            'status-lokasi-view',
            'status-lokasi-create',
            'status-lokasi-update',
            'status-lokasi-delete',
    
            'sphere-lokasi-view',
            'sphere-lokasi-create',
            'sphere-lokasi-update',
            'sphere-lokasi-delete',
    
            'riwayat-pengungsi-view',
            'riwayat-pengungsi-create',
            'riwayat-pengungsi-update',
            'riwayat-pengungsi-delete',
    
            'sphere-pengungsi-view'
    
        ]);

    }

}
