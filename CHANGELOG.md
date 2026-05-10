# Changelog

## 0.1.0-alpha.1 — 2026-05-11

First public release. Laravel ServiceProvider + facade for `astroway/sdk` — auto-discovered, env-driven, container singleton.

### Added

- **`AstrowayServiceProvider`** — auto-registered via `composer.json` `extra.laravel.providers`. Reads `config('astroway')`, builds singleton `Astroway\Astroway` binding.
- **`Astroway\Laravel\Facades\Astroway`** — static facade auto-aliased as `Astroway` for those who prefer facade-style.
- **`config/astroway.php`** — publishable via `php artisan vendor:publish --tag=astroway-config`. Pulls `api_key` / `base_url` / `timeout` / `auth_scheme` from `.env`.
- **Container alias `'astroway'`** — `app('astroway')` resolves to the same singleton.

### Stack

- PHP 8.1+ (constructor promotion, readonly, match).
- Laravel 10 / 11 / 12.
- Depends on `astroway/sdk` `>=0.1.0-alpha.0`.

### Verification

5 PHPUnit tests via `orchestra/testbench` — singleton resolution, alias resolution, facade root identity, config defaults, `provides()` shape.

### What's not in this release (intentional)

- No Telescope panel yet — coming in `0.1.0-beta.1`.
- No Artisan commands yet — coming in `0.1.0-rc.1`.
