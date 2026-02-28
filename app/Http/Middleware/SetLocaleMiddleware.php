<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware
{
    /**
     * Supported locales
     */
    protected array $supportedLocales = ['en', 'ru'];

    public function handle(Request $request, Closure $next)
    {
        // 1. Session takes precedence (user choice overrides header)
        if (session()->has('locale') && in_array(session('locale'), $this->supportedLocales)) {
            App::setLocale(session('locale'));
        }
        // 2. Otherwise, try the Accept-Language header
        elseif ($request->hasHeader('Accept-Language')) {
            $preferred = $request->getPreferredLanguage($this->supportedLocales);
            if ($preferred) {
                App::setLocale($preferred);
            }
        }

        return $next($request);
    }
}
