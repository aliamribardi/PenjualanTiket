<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tiket;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
        
        Tiket::factory(50)->create();
        
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        // ===========================

        $admin = User::create([
            'name' => 'Aliamri',
            'email' => 'aliamri@gmail.com',
            'password' => bcrypt('aliamrib')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('userbaru')
        ]);

        $user->assignRole('user');
        
        Category::create([
            'name' => 'Music'
        ]);
        
        Category::create([
            'name' => 'Teater'
        ]);
        
        Category::create([
            'name' => 'Film'
        ]);
    }
}
