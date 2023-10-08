<?php

namespace App\Providers;

use App\UseCases\IMineralResourceDataSystemUseCase;
use App\UseCases\MineralResourceDataSystemUseCase;
use Illuminate\Support\ServiceProvider;

class UseCaseServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    $this->app->bind(
      IMineralResourceDataSystemUseCase::class,
      MineralResourceDataSystemUseCase::class
    );
  }
}
