<?php

namespace App\Providers;

use Gate;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Currency' => 'App\Policies\CurrencyPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * For comf. admin authorization in ValidatedCurrencyRequest 'cause
         * we need ability to edit and create.
         */
        Gate::define('admin', function (User $user) {
            return $user->getAttribute('is_admin');
        });

        Gate::define('create', 'App\Policies\CurrencyPolicy@update');
        Gate::define('edit', 'App\Policies\CurrencyPolicy@update');
        Gate::define('delete', 'App\Policies\CurrencyPolicy@update');
    }
}
