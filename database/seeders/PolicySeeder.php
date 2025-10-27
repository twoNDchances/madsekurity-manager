<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Policy;
use App\Models\User;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policyName = 'full-access';
        if (!Policy::query()->where('name', $policyName)->exists())
        {
            $user = User::firstWhere('email', env('MANAGER_USER_MAIL', 'root@madsekurity.2ndproject.site'));
            $policy = Policy::create([
                'name'    => $policyName,
                'user_id' => $user->id,
            ]);
            $permissions = Permission::where('action', 'like', '%.all')->pluck('id');
            $policy->permissions()->sync($permissions);
        }
    }
}
