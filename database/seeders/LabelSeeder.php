<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Env;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user  = User::firstWhere('email', Env::get('MANAGER_USER_MAIL', 'root@madsekurity.2ndproject.site'));
        $label = Label::firstOrCreate(
            ['name' => Env::get('MANAGER_LABEL_DEFAULT', 'default-assets')],
            [
                'color'       => '#a855f7',
                'description' => 'Default assets when the application first booted.',
                'user_id'     => $user->id,
            ],
        );
        $user->labels()->sync($label->id);
    }
}
