<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Permission;
use App\Models\Policy;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Env;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policyName = Env::get('MANAGER_POLICY_DEFAULT', 'full-access');
        if (!Policy::query()->where('name', $policyName)->exists())
        {
            $user = User::firstWhere('email', env('MANAGER_USER_MAIL', 'root@madsekurity.2ndproject.site'));
            $policy = Policy::create([
                'name'    => $policyName,
                'user_id' => $user->id,
            ]);
            $permissions = Permission::where('action', 'like', '%.all')->pluck('id');
            $policy->permissions()->sync($permissions);
            Label::firstWhere('name', Env::get('MANAGER_LABEL_DEFAULT', 'default-assets'))
            ->policies()
            ->sync($policy->id);
        }
    }
}
