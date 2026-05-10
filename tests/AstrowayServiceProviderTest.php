<?php

declare(strict_types=1);

namespace Astroway\Laravel\Tests;

use Astroway\Astroway;
use Astroway\Laravel\AstrowayServiceProvider;
use Astroway\Laravel\Facades\Astroway as AstrowayFacade;
use Orchestra\Testbench\TestCase;

final class AstrowayServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [AstrowayServiceProvider::class];
    }

    protected function getPackageAliases($app): array
    {
        return ['Astroway' => AstrowayFacade::class];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('astroway.api_key', 'aw_test_x');
        $app['config']->set('astroway.timeout', 15.0);
    }

    public function testAstrowayResolvesFromContainerAsSingleton(): void
    {
        $a = $this->app->make(Astroway::class);
        $b = $this->app->make(Astroway::class);
        self::assertInstanceOf(Astroway::class, $a);
        self::assertSame($a, $b, 'singleton binding should return the same instance');
    }

    public function testShortAliasAlsoResolves(): void
    {
        $aw = $this->app->make('astroway');
        self::assertInstanceOf(Astroway::class, $aw);
    }

    public function testFacadeResolvesToSingleton(): void
    {
        $bound = $this->app->make(Astroway::class);
        $viaFacade = AstrowayFacade::getFacadeRoot();
        self::assertSame($bound, $viaFacade);
    }

    public function testConfigDefaultsApply(): void
    {
        self::assertSame(15.0, (float) $this->app['config']->get('astroway.timeout'));
        self::assertSame('header', $this->app['config']->get('astroway.auth_scheme'));
    }

    public function testServiceProviderProvidesArrayContainsBindings(): void
    {
        $provided = (new AstrowayServiceProvider($this->app))->provides();
        self::assertContains(Astroway::class, $provided);
        self::assertContains('astroway', $provided);
    }
}
