<?php

namespace App\Providers;

use App\Repositories\IMineralResourceDataSystemRepository;
use App\Repositories\MineralResourceDataSystemRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    $this->app->bind(
      IMineralResourceDataSystemRepository::class,
      MineralResourceDataSystemRepository::class
    );
  }
}
