<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->language){
            $locale = $request->language;
        }else if (Session::has('user_lang')) {
            $locale = Session::get('user_lang');
        } else if (request('language')) {
            $locale = request('language');
        } else {
            $locale = 'ar';
        }

        Session::put('user_lang',$locale);
        // Check header request and determine localizaton
        $local = ($request->hasHeader('language')) ? $request->header('language') : $locale;

        // set laravel localization
        app()->setLocale($local);

        return $next($request);
    }
}
