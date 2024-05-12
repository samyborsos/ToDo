<?php

namespace App\Providers;

use App\Models\Todo;
use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\Access\Response as AccessResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('edit-todo', function (User $user, Todo $todo) {
            return ($todo->user->id == $user->id || $user->isAdmin());
        });

        Gate::define('edit-user', function (User $user, User $profileUser) {
            return $user->id === $profileUser->id;
        });


        Gate::define('admin', function (User $user) {
            return ($user->isAdmin());
        });
    }


}
