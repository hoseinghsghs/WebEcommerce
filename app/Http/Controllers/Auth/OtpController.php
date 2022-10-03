<?php

namespace App\Http\Controllers\Auth;

use App\Events\NotificationMessage;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class OtpController extends Controller
{
    public function authenticate(Request $request)
    {
        if (is_numeric($request->username)) {
            $data = $request->validate([
                'username' => 'required|ir_mobile'
            ]);
        } else {
            $data = $request->validate([
                'username' => ['required', 'email', 'exists:users,email', function ($attribute, $value, $fail) {
                    $user = User::where('email', $value)->first();
                    if (empty($user->email_verified_at)) {
                        $fail('ایمیل تایید نشده است');
                    }
                }]
            ]);
        }

        if ($request->expectsJson()) {
            $user = User::where('cellphone', $data['username'])->orWhere('email', $data['username'])->first();
            if ($user && isset($user->password) && !$request->forget_password) {
                return response()->json(['message' => 'need password']);
            }
            $otp = Otp::create([
                'user_id' => $user->id ?? null,
                'cellphone' => $user ? $user->cellphone : $data['username'],
            ]);
            if ($otp->sendCode()) {
                $timeToExpire = (env('OTP_TIME', 2) * 60) - ($otp->updated_at->diffInSeconds(Carbon::now()));
                return response()->json([
                    'message' => 'code sended',
                    'id' => $otp->id,
                    'time_to_expire' => $timeToExpire
                ], 200);
            }
            $otp->delete();
            return response()->json([
                'error' => 'خطا در ارسال کد تایید'
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

            if ($otp->sendCode(true)) {
                $timeToExpire = (env('OTP_TIME', 2) * 60) - ($otp->updated_at->diffInSeconds(Carbon::now()));
                return response()->json(['id' => $otp->id, 'time_to_expire' => $timeToExpire], 200);
            }

            return response()->json([
                'erorr' => 'خطا در ارسال کد تایید'
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
                'otp_code' => 'required|numeric|digits:5',
                'remember' => 'nullable|boolean',
            ]);

            $otp = Otp::where('id', $data['id'])->first();

            if (!$otp || empty($otp->id))
                return response()->json(['error' => 'Id not found'], 422);
            if (!$otp->isValid())
                return response()->json(['errors' => ['otp_code' => ['کد تایید منقضی شده است']]], 422);
            if ($otp->code !== $data['otp_code'])
                return response()->json(['errors' => ['otp_code' => ['کد تایید نامعتبر است']]], 422);
            // check verification code and then show form for change password
            if ($request->forget_password) {
                session()->flash($otp->cellphone, 'checked');
                $otp->delete();
                return response()->json(['message' => 'check successfull']);
            }
            //find or create user if not exists
            if ($otp->user_id) {
                $user = User::findOrFail($otp->user_id);
            } else {
                $user = User::create([
                    'cellphone' => $otp->cellphone,
                ]);
                //broudcast
                $event= Event::create([
                    'title' => 'کاربر جدید ثبت نام کرد',
                    'body' => 'کاربر'  . " " .  $user->cellphone,
                    'user_id' => $user->id,
                    'eventable_id' =>$user->id,
                    'eventable_type' => User::class,
                ]);

                try {
                    broadcast(new NotificationMessage($event))->toOthers();
                } catch (\Throwable $th) {
                    
                }
                try {
                    Log::info("کابر جدید ثبت شد" , [  'title' => 'کاربر جدید ثبت نام کرد',
                    'body' => 'کاربر'  . " " .  $user->cellphone,
                    'user_id' => $user->id,
                    'eventable_id' =>$user->id,
                    'eventable_type' => User::class,
                    ]);
                } catch (\Throwable $th) {
                }
                //endbroudcast
            }
            // login user
            Auth::login($user, $request->has('remember') ? $data['remember'] : null);
            $otp->delete();
            return response()->json([
                'message' => 'کد تایید صحیح است'
            ], 200);
        } else {
            return abort(404);
        }
    }
    // reset password
    public function resetPassword(Request $request)
    {
        if ($request->session()->has($request->cellphone) && session($request->cellphone) == 'checked') {
            $validator = Validator::make($request->all(), [
                'password' => ['required', 'confirmed', Password::min(8)],
                'cellphone' => 'required|ir_mobile|exists:users,cellphone'
            ]);
            if ($validator->fails()) {
                $request->session()->keep([$request->cellphone]);
                return response()->json(['errors' => $validator->getMessageBag()->toArray()], 400);
            }
            $user = User::where('cellphone', $request->cellphone)->first();
            $user->update(['password' => Hash::make($request->password)]);
            if(!auth()->check()){
                Auth::login($user);
            }
            alert()->success('رمزعبور با موفقیت تغییر یافت.')->timerProgressBar()->toToast();
            return response()->json(['message' => 'رمزعبور با موفقیت تغییر یافت.']);
        } else {
            return response()->json(['error' => 'شما دسترسی ندارید'], 422);
        }
    }

    // add or change phone in user profile
    public function alterPhone(Request $request)
    {
        if ($request->expectsJson()) {
            $data = $request->validate([
                'phone' => 'required|unique:users,cellphone|ir_mobile',
            ]);

            $otp = Otp::create([
                'user_id' =>  null,
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
                'error' => 'خطا در ارسال کد تایید'
            ], 500);
        } else {
            return abort(404);
        }
    }

    public function verfiyPhone(Request $request)
    {
        if ($request->expectsJson()) {
            $data = $request->validate([
                'id' => 'required|uuid',
                'otp_code' => 'required|numeric|digits:5',
            ]);

            $otp = Otp::where('id', $data['id'])->first();

            if (!$otp || empty($otp->id))
                return response()->json(['error' => 'Id not found'], 422);
            if (!$otp->isValid())
                return response()->json(['errors' => ['otp_code' => ['کد تایید منقضی شده است']]], 422);
            if ($otp->code !== $data['otp_code'])
                return response()->json(['errors' => ['otp_code' => ['کد تایید نامعتبر است']]], 422);

            auth()->user()->update(['cellphone' => $otp->cellphone]);

            $otp->delete();
            alert('', 'شماره همراه با موفقیت ثبت شد', 'success')->showConfirmButton('تایید');
            return response()->json([
                'message' => 'success'
            ], 200);
        } else {
            return abort(404);
        }
    }
    //end change phone number in profile
}
