<?php

namespace Cable8mm\ValidationKisaRules;

use Illuminate\Support\ServiceProvider;

class ValidationKisaRulesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/validationKisaRules'),
        ]);

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'validationKisaRules');
    }
}
