<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PemisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sekretarisRole = Role::create([
            'name' => 'sekretaris',
            'guard_name' => 'web'
        ]);

        $bendaharaRole = Role::create([
            'name' => 'bendahara',
            'guard_name' => 'web'
        ]);

        $dekanatRole = Role::create([
            'name' => 'dekanat',
            'guard_name' => 'web'
        ]);
        $userRole = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        $user = User::factory()->create([
            'name' => 'sekretaris',
            'email' => 'sekretaris@gmail.com',
            'password' => bcrypt('asdasdasd')
        ]);
        $user->assignRole($sekretarisRole);

        $user = User::factory()->create([
            'name' => 'bendahara',
            'email' => 'bendahara@gmail.com',
            'password' => bcrypt('asdasdasd')
        ]);
        $user->assignRole($bendaharaRole);

        $user = User::factory()->create([
            'name' => 'dekanat',
            'email' => 'dekanat@gmail.com',
            'password' => bcrypt('asdasdasd')
        ]);
        $user->assignRole($dekanatRole);

        $user = User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('asdasdasd')
        ]);
        $user->assignRole($userRole);
        
    }
}
