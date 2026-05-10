# `astroway/sdk-laravel` — Roadmap & Release Queue

**Source:** `github.com/astroway/astroway-php-laravel-staging` (private)
**Public artifact repo:** `github.com/astroway/astroway-php-laravel` (MIT)
**Packagist package:** `astroway/sdk-laravel`
**Cadence:** randomized 28–56 days between minors. Patches 7–14 days.

## Release process

Same queue-first cadence as `astroway/sdk`. Bootstrap first release: `previous_sdk_version: null`. Submit to Packagist once at <https://packagist.org/packages/submit>; auto-mirror picks up subsequent tags.

## Pending queue

### 0.1.0-alpha.1 — Initial (this release)

ServiceProvider + facade + config publish. Auto-discovery enabled.

### 0.1.0-alpha.2 — Container resolver convenience

`astroway()` helper function — `astroway()->chart()->compute(...)`.

### 0.1.0-beta.1 — Telescope integration

Every Astroway call visible in Telescope HTTP tab — URL, latency, request id, credits remaining.

### 0.1.0-rc.1 — Artisan commands

`php artisan astroway:health` (deep DB check via `/v1/health/deep`), `astroway:credits` (current quota), `astroway:keys` (list user keys).

### 0.1.0 — Stable surface freeze

ServiceProvider API + facade signatures locked.

### 1.0.0 — Production guarantee

Drop Laravel 10 if 12 is the only supported branch.

---

## Updating this plan

See `docs/PLAN-CONVENTIONS.md` in `api.astroway.info` repo for the mandatory rules.
