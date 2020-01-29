<?php

namespace App\Http\Middleware;

use Closure;

class DemoAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $ipWhitelist = ['127.0.0.1', '::1'];

    public function handle($request, Closure $next)
    {
        if (app()->environment() == 'demo') {
            return abort(403, 'Deze functie is uitgeschakeld in demo-modus.');
        }

        return $next($request);
    }

    protected function clientNotAllowed()
    {
        $isAllowedIP = in_array(request()->ip(), $this->ipWhitelist);

        return (!$isAllowedIP && auth()->guest())
            || ($isAllowedIP && !auth()->guest());
    }

}
