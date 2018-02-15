<?php

namespace App\Providers;

use App\Services\GitHubServices\GitHubApi;
use Illuminate\Support\ServiceProvider;

class GitHubServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\GitHubServices\GitHubServiceInterface', function () {
            return new GitHubApi();
        });
    }
}
