<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use PHPUnit\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class GoogleAuthController extends Controller
{
    use TwoFactorAuthenticate;

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user == User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random()),
                'two_factor_type' => 'off'
            ]);
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        auth()->loginUsingId($user->id);


//        Alert::success('login successfully','welcome to your dashboard');

        return $this->loggendin($request, $user) ?: redirect('/');
    }
}
