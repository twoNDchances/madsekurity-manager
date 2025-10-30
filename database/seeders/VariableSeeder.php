<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Setting;
use App\Models\User;
use App\Models\Variable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Env;

class VariableSeeder extends Seeder
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
        $variables = [
            'manager-system' => [
                [
                    'key'         => 'MANAGER_HTTP_USER_AGENT',
                    'value'       => Env::get('MANAGER_HTTP_USER_AGENT', 'M&DSecurity/Manager'),
                    'description' => 'User-Agent of HTTP request for Manager',
                ],
                [
                    'key'         => 'MANAGER_TOKEN_KEY',
                    'value'       => Env::get('MANAGER_TOKEN_KEY', 'X-Manager-Token'),
                    'description' => 'The key name for authentication & authorization when Manager remoted by API',
                ],
            ],
            'defender-system' => [
                //
            ],
            'kubernetes-system' => [
                //
            ],
        ];
        $variableIds = [];
        foreach ($variables as $settingName => $settingVariables)
        {
            $setting = Setting::firstWhere('name', $settingName);
            if (!$setting)
            {
                continue;
            }
            foreach ($settingVariables as $variable)
            {
                $variableIds[] = Variable::firstOrCreate(
                    [
                        'setting_id' => $setting->id,
                        'key'        => $variable['key'],
                    ],
                    [
                        'value'       => $variable['value'],
                        'description' => $variable['description'],
                        'user_id'     => $user->id,
                    ],
                );
            }
        }
        Label::firstWhere('name', Env::get('MANAGER_LABEL_DEFAULT', 'default-assets'))
        ->variables()
        ->sync($variableIds);
    }
}
