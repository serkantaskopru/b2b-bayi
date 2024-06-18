<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class InitializeTenancyByDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
            $hostname = $request->getHost();

            Auth::setDefaultDriver('tenant'); // Set the default guard to 'tenant_user'
            Auth::shouldUse('tenant');

            $db = DB::getDatabaseName();
            /*Log::alert($hostname);
            Log::alert($db);*/
            /*$tenant = Tenant::where('domain', $hostname)->firstOrFail();

            if($tenant){
                $db = DB::getDatabaseName();
                //$tenant->makeCurrent();
                Log::alert("Current tenant:");
                Log::alert(app('currentTenant'));
                Log::alert($db);
            }*/

        }catch (\Exception $exception){
            Log::error($exception);
        }
        return $next($request);
    }
}
