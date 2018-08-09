<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\VerificationToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Events\UserRequestedVerificationEmail;

class VerificationController extends Controller
{
    public function verify(VerificationToken $token)
    {
        $token->user()->update([
            'verified' => true
        ]);
        $token->delete();

        return redirect()->route('login')->withInfo(trans('register.msg.verify_acount_success'));
    }

    public function resend(Request $request)
    {
        $user = User::byEmail($request->email)->firstOrFail();

        if($user->hasVerifiedEmail()) {
            return redirect()->route('home')->withInfo(trans('register.msg.email_verified'));
        }

        event(new UserRequestedVerificationEmail($user));

        return redirect()->route('login')->withInfo(trans('register.msg.resend_verify'));
    }
}
