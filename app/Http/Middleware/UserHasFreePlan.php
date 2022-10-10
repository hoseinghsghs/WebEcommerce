<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class UserHasFreePlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->hasRole('test-user')) {
            DB::disconnect('mysql');
            Config::set('database.connections.mysql.database', 'meta_webs');

            $meta_user = User::where('cellphone', $request->user()->cellphone)->first();
            if ($meta_user && $meta_user->expire_free_plan && now()->greaterThan($meta_user->expire_free_plan)) {
                try {
                    DB::beginTransaction();
                    DB::table('users')
                        ->where('id', $meta_user->id)
                        ->update(['expire_free_plan' => null, 'used_free_plan' => true]);

                    DB::disconnect('mysql');
                    Config::set('database.connections.mysql.database', 'ecommerce');
                    $request->user()->syncRoles([]);
                    DB::commit();
                } catch (\Exception $th) {
                    DB::rollBack();
                    alert()->error('خطا', $th->getMessage())->showConfirmButton('تایید');
                }

                alert()->error('خطا', 'مهلت تست شما به اتمام رسیده است')->showConfirmButton('تایید')->timerProgressBar();
                return redirect()->route('home');
            }

            DB::disconnect('mysql');
            Config::set('database.connections.mysql.database', 'ecommerce');
        }
        return $next($request);
    }
}
