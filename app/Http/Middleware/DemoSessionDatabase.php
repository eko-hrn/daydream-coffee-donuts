<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class DemoSessionDatabase
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('demo_db_created')) {
            $request->session()->put('demo_db_created', true);
        }

        $sessionId = $request->session()->getId();
        $dbPath = database_path("demo_sessions/demo_{$sessionId}.sqlite");

        if (!File::exists(database_path('demo_sessions'))) {
            File::makeDirectory(database_path('demo_sessions'), 0755, true);
        }

        if (!File::exists($dbPath)) {
            File::put($dbPath, ''); 

            Config::set('database.connections.sqlite_demo', [
                'driver' => 'sqlite',
                'database' => $dbPath,
                'prefix' => '',
                'foreign_key_constraints' => true,
            ]);

            Artisan::call('migrate', [
                '--database' => 'sqlite_demo',
                '--force' => true,
            ]);

            Artisan::call('db:seed', [
                '--database' => 'sqlite_demo',
                '--force' => true,
            ]);
        }

        Config::set('database.connections.sqlite_demo', [
            'driver' => 'sqlite',
            'database' => $dbPath,
            'prefix' => '',
            'foreign_key_constraints' => true,
        ]);

        DB::setDefaultConnection('sqlite_demo');

        return $next($request);
    }
}