<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' =>'Admin']);
        $role2 = Role::create(['name' => 'Trabajador']);

        User::create([
            'name'=>'Miguel',
            'email'=>'miguel@gmail.com',
            'password'=>'$2y$10$bij1KOHENgisGWbrrPgr1O7thjyFAr2B/78Zv2FgNZtwtKd8yJrjW',
        ])->syncRoles(['Admin']);

        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'Users.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'categories.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categories.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'providers.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'providers.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'providers.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'providers.destroy'])->syncRoles([$role1]);



    }
}
