<?php

declare(strict_types=1);

namespace Astroway\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Static facade — `Astroway::chart()->compute([...])`.
 *
 * Resolves to the singleton bound by `AstrowayServiceProvider::register()`.
 *
 * @method static \Astroway\Namespaces\ChartService chart()
 * @method static \Astroway\Namespaces\SynastryService synastry()
 * @method static \Astroway\Namespaces\TransitsService transits()
 * @method static \Astroway\Namespaces\AiService ai()
 * @method static mixed get(string $path, array $query = [])
 * @method static mixed post(string $path, array|object|null $body = null, array $query = [], ?bool $cache = null)
 * @method static mixed request(string $method, string $path, array $options = [])
 * @method static \Astroway\Concurrent concurrent(int $maxConcurrency = 10)
 *
 * @see \Astroway\Astroway
 */
final class Astroway extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'astroway';
    }
}
