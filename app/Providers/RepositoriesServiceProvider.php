<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider{
    public function register(){
        $this->app->bind(
            'App\Repositories\CinemaInterface',
            'App\Repositories\CinemaRepository',

            'App\Repositories\MovieInterface',
            'App\Repositories\MovieRepository',

            'App\Repositories\ShowtimeInterface',
            'App\Repositories\ShowtimeRepository',

        );
    }
}
