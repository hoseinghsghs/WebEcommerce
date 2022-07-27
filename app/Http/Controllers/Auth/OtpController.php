<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function sendVerificationCode(Request $request)
    {
        if ($request->expectsJson()) {
            $data = $request->validate([
                'phone' => 'required|numeric|digits:11',
            ]);

            $user = User::where('cellphone', $data['phone'])->first();
            $otp = Otp::create([
                'user_id' => $user->id ?? null,
                'cellphone' => $data['phone'],
            ]);
            if ($otp->sendCode($data['phone'])) {
                $timeToExpire = (env('OTP_TIME', 2) * 60) - ($otp->updated_at->diffInSeconds(Carbon::now()));
                return response()->json([
                    'id' => $otp->id,
                    'time_to_expire' => $timeToExpire
                ], 200);
            }
            $otp->delete();
            return response()->json([
                'message' => 'خطا در ارسال کد تایید'
            ], 500);
        } else {
            return abort(404);
        }
    }

    public function resendVerificationCode(Request $request)
    {
        if ($request->expectsJson()) {
            $request->validate([
                'id' => 'required|uuid',
            ]);

            $otp = Otp::findOrFail($request->id);

            if ($otp->sendCode($otp->cellphone, true)) {
                $timeToExpire = (env('OTP_TIME', 2) * 60) - ($otp->updated_at->diffInSeconds(Carbon::now()));
                return response()->json(['id' => $otp->id, 'time_to_expire' => $timeToExpire], 200);
            }

            return response()->json([
                'message' => 'خطا در ارسال کد تایید'
            ], 500);
        } else {
            return abort(404);
        }
    }

    public function checkVerificationCode(Request $request)
    {
        if ($request->expectsJson()) {
            $data = $request->validate([
                'id' => 'required|uuid',
                'code' => 'required|numeric|digits:6',
                'remember' => 'boolean',
            ]);

            $otp = Otp::where('id', $data['id'])->first();

            if (!$otp || empty($otp->id))
                return response()->json(['message' => 'Id not found'], 422);
            if (!$otp->isValid())
                return response()->json(['errors' => ['code' => ['کد تایید منقضی شده است']]], 422);
            if ($otp->code !== $data['code'])
                return response()->json(['errors' => ['code' => ['کد تایید نامعتبر است']]], 422);

            if ($otp->user_id) {
                $user = User::findOrFail($otp->user_id);
            } else {
                $user = User::create([
                    'cellphone' => $otp->cellphone,
                ]);
            }
            Auth::login($user, $data['remember']);
            $otp->delete();
            return response()->json([
                'message' => 'کد تایید صحیح است'
            ], 200);
        } else {
            return abort(404);
        }
    }
}