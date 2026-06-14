<?php

namespace App\Providers;

use App\Interfaces\AuthRepositoryInterface;
use App\Interfaces\DesaRepositoryInterface;
use App\Interfaces\LokasiRepositoryInterface;
use App\Interfaces\RelawanRepositoryInterface;
use App\Interfaces\SphereLokasiRepositoryInterface;
use App\Interfaces\StatusLokasiRepositoryInterface;
use App\Repositories\LokasiRepository;
use App\Repositories\AuthRepository;
use App\Repositories\DesaRepository;
use App\Repositories\RelawanRepository;
use App\Repositories\SphereLokasiRepository;
use App\Repositories\StatusLokasiRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(RelawanRepositoryInterface::class, RelawanRepository::class);
        $this->app->bind(DesaRepositoryInterface::class, DesaRepository::class);
        $this->app->bind(LokasiRepositoryInterface::class, LokasiRepository::class);
        $this->app->bind(StatusLokasiRepositoryInterface::class, StatusLokasiRepository::class);
        $this->app->bind(SphereLokasiRepositoryInterface::class, SphereLokasiRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
