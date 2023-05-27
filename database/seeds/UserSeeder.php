<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 10)->create();

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('qwertyui'), // password
            'remember_token' => Str::random(10),
            'address' => 'test'
        ]);

        Role::create(['name' => 'admin']);

        $user->assignRole('admin');
    }
}
