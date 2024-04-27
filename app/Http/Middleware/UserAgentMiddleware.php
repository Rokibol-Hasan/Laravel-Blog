<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAgentMiddleware
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

        $userAgent = $request->header('User-Agent');
        // Parse user agent string using a library like "jenssegers/agent"
        $browser = new \Jenssegers\Agent\Agent();
        $browser->setUserAgent($userAgent);

        // Extract browser information
        $browserName = $browser->browser();
        $browserVersion = $browser->version($browserName);
        $deviceName = $browser->device($browserName);
        $platformName = $browser->platform($browserName);
        $platformVersion = $browser->version($platformName);

        $request->session()->put('browser', [
            'browser_name' => $browserName,
            'browser_version' => $browserVersion,
            'device_name' => $deviceName,
            'platform' => $platformName,
            'platform_version' => $platformVersion,
        ]);


        return $next($request);
    }
    
}
