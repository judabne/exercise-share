<?php
namespace App\Providers;
use App\Bodypart; // write model name here
use Illuminate\Support\ServiceProvider;
class DynamicBodyparts extends ServiceProvider

{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('body_parts_array', bodyPart::all());
        });
    }
}
