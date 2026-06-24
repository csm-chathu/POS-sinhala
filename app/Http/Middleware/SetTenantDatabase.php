<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SetTenantDatabase
{
    public function handle(Request $request, Closure $next): Response
    {
        $host    = $request->getHost();
        $tenants = config('tenants', []);

        if (isset($tenants[$host])) {
            $tenant = $tenants[$host];

            config([
                'database.connections.mysql.database' => $tenant['database'],
                'database.connections.mysql.username' => $tenant['username'],
                'database.connections.mysql.password' => $tenant['password'],
                'database.connections.mysql.host'     => $tenant['host'] ?? config('database.connections.mysql.host'),
            ]);

            DB::purge('mysql');
        } elseif (app()->isProduction()) {
            abort(403, "Unknown host: {$host}");
        }

        return $next($request);
    }
}
