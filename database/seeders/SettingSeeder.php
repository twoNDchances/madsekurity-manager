<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Env;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstWhere(
            'email', 
            Env::get('MANAGER_USER_MAIL', 'root@madsekurity.2ndproject.site'),
        );
        $settings = [
            [
                'name'        => 'manager-system',
                'description' => <<<PHP
Manager settings:
1. MANAGER_HTTP_USER_AGENT: User-Agent of HTTP request for Manager
2. MANAGER_TOKEN_KEY: The key name for authentication & authorization when Manager remoted by API
PHP,
            ],
            [
                'name'        => 'defender-system',
                'description' => <<<PHP
Defender settings:
PHP,
            ],
            [
                'name'        => 'kubernetes-system',
                'description' => <<<PHP
Kubernetes settings:
PHP,
            ],
        ];
        $settingIds = [];
        foreach ($settings as $setting)
        {
            $settingIds[] = Setting::firstOrCreate(
                ['name' => $setting['name']],
                [
                    'description' => $setting['description'],
                    'user_id'     => $user->id,
                ],
            )
            ->id;
        }
        Label::firstWhere('name', Env::get('MANAGER_LABEL_DEFAULT', 'default-assets'))
        ->settings()
        ->sync($settingIds);
    }
}
