<?php

namespace Cable8mm\ValidationKisaRules;

use Illuminate\Support\ServiceProvider;

class ValidationKisaRulesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'validationKisaRules');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/validationKisaRules'),
        ]);
    }
}
