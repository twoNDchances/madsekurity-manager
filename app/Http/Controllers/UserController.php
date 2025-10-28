<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function verify($email, $token)
    {
        $user = User::where('email', $email)->where('token', $token)->first();
        if (!$user)
        {
            abort(404);
        }
        $user->update(
            [
                'email_verified_at'  => Carbon::now(),
                'token' => null,
            ],
        );
        Auth::login($user, true);
        return response()->redirectTo(route('filament.manager.pages.dashboard'));
    }
}
