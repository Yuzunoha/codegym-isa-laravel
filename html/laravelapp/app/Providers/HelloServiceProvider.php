<?php

namespace App\Providers;

use App\Http\Validators\HelloValidator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelloServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $validator = $this->app['validator'];
        $resolverCallback = function ($t, $d, $r, $m) {
            return new HelloValidator($t, $d, $r, $m);
        };
        $validator->resolver($resolverCallback);
    }
}
