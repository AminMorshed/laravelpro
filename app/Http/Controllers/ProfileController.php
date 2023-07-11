<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function manageTwoFactor()
    {
        return view('profile.two-factor-auth');
    }

    public function postManageTwoFactor(Request $request)
    {
        $date = $request->validate([
            'type' => 'required|in:sms,off',
            'phone' => 'required_if:type,sms',
        ]);

        if ($date['type'] === 'sms') {
            if ($request->user()->phone_number !== $date['phone']) {
                return redirect(route('profile.2fa.phone'));
            } else {
                $request->user()->update([
                    'two_factor_type' => 'sms',
                ]);
            }
        }

        if ($date['type'] === 'off') {
            $request->user()->update([
                'two_factor_type' => 'off',
            ]);
        }

        return back();
    }

    public function getPhoneVerify()
    {
        return view('profile.phone-verify');
    }

    public function postPhoneVerify(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        return $request->token;
    }
}
