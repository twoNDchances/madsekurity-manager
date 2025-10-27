<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => Env::get('MANAGER_USER_MAIL', 'root@madsekurity.2ndproject.site')],
            [
                'name'              => Env::get('MANAGER_USER_NAME', 'root'),
                'email_verified_at' => Carbon::now(),
                'password'          => Hash::make(Env::get('MANAGER_USER_PASS', 'root')),
                'is_admin'          => true,
                'can_login'         => true,
            ],
        );
        $user->update(['user_id' => $user->id]);
    }
}
