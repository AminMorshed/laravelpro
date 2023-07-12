<?php

namespace App\Http\Controllers;

use App\Models\ActiveCode;
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

                $code = ActiveCode::generateCode($request->user());
                $request->session()->flash('phone',$date['phone']);

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

    public function getPhoneVerify(Request $request)
    {
        if (! $request->session()->has('phone')){
            return redirect(route('profile.2fa.manage'));
        }

        $request->session()->reflash();


        return view('profile.phone-verify');
    }

    public function postPhoneVerify(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        if (! $request->session()->has('phone')){
            return redirect(route('profile.2fa.manage'));
        }

        $status = ActiveCode::verifyCode($request->token, $request->user());

        if ($status) {
            $request->user()->activeCode()->delete();
            $request->user()->update([
                'phone_number' => $request->session()->get('phone'),
               'two_factor_type' => 'sms'
            ]);

            alert()->success('ok','its ok');
        }else{
            alert()->error('not ok','its not ok');
        }

        return redirect(route('profile.2fa.manage'));
    }
}
