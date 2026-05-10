<?php

declare(strict_types=1);

namespace Astroway\Laravel;

use Astroway\Astroway;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

/**
 * Laravel ServiceProvider for the AstroWay SDK.
 *
 * Auto-discovered via `composer.json`'s `extra.laravel.providers` — no manual
 * registration in `config/app.php` needed.
 *
 * After install:
 *
 *     php artisan vendor:publish --provider="Astroway\Laravel\AstrowayServiceProvider"
 *     # Set ASTROWAY_API_KEY in .env
 *
 * Then use the binding:
 *
 *     use Astroway\Astroway;
 *     public function chart(Astroway $aw) { return $aw->chart()->compute([...]); }
 *
 * Or the facade:
 *
 *     use Astroway\Laravel\Facades\Astroway;
 *     Astroway::chart()->compute([...]);
 */
final class AstrowayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/astroway.php', 'astroway');

        $this->app->singleton(Astroway::class, function (Application $app): Astroway {
            $cfg = $app['config']->get('astroway');
            $opts = [
                'apiKey' => $cfg['api_key'] ?? null,
            ];
            if (!empty($cfg['base_url'])) {
                $opts['baseUrl'] = $cfg['base_url'];
            }
            if (isset($cfg['timeout'])) {
                $opts['timeout'] = (float) $cfg['timeout'];
            }
            if (!empty($cfg['auth_scheme'])) {
                $opts['authScheme'] = $cfg['auth_scheme'];
            }
            return new Astroway($opts);
        });

        // Bind the short `astroway` alias so the facade's accessor resolves.
        $this->app->alias(Astroway::class, 'astroway');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/astroway.php' => $this->app->configPath('astroway.php'),
            ], 'astroway-config');
        }
    }

    /** @return array<int, string> */
    public function provides(): array
    {
        return [Astroway::class, 'astroway'];
    }
}
