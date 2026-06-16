<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CheckRoleSeeder extends Seeder
{
    public function run()
    {
        $users = User::with('roles')->get();
        foreach ($users as $user) {
            echo $user->email . ' => roles: [' . $user->roles->pluck('name')->implode(', ') . ']' . PHP_EOL;
        }
    }
}
