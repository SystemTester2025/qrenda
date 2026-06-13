# qrenda agent notes

## Verified stack
- Laravel 10 app (`composer.json`) requiring PHP `^8.1`; root autoloads `app/helpers.php` and maps `Modules\` to `Modules/`.
- Multi-tenant SaaS using Stancl Tenancy: central domains are `127.0.0.1` and `localhost`; tenant DB names use prefix `tenant{id}`.
- Spatie Permission roles drive `admin` and `super_admin` route groups; `valid.user` blocks inactive/unverified users; `subscription` redirects expired plans.

## Commands
- No lint/typecheck scripts are defined in `composer.json` or `package.json`; verify with focused Artisan/phpunit commands instead.
- If bootstrapping from a clean checkout: `composer install`, `npm install`, `Copy-Item .env.example .env`, `php artisan key:generate`, `php artisan migrate`, `php artisan storage:link`.
- Fresh installs are guarded by `FreshInstall`; `storage/installed` marks installed apps, otherwise routes redirect to `route('installs')`.
- Set `APP_DOMAIN` to the local host you use; `CustomDomainCheck` treats a host different from `APP_DOMAIN` as a custom domain and can 404.
- Run all tests: `vendor/bin/phpunit`.
- Run one test: `vendor/bin/phpunit tests/Feature/RegistrationTest.php --filter test_new_users_can_register`.
- PHPUnit sets `APP_ENV=testing`, array cache/session/mail, sync queue; sqlite is commented out, so tests use the configured DB unless overridden.

## Assets
- **NEVER run `npx mix`, `npm run dev`, or `npm run production`.** The user handles builds manually. Only edit source files under `resources/assets/`; the build output in `public/assets/` is generated externally.
- Root frontend build is Laravel Mix (`webpack.mix.js`), not Vite; edit `resources/assets/**`.
- Mix writes compiled assets to `public/assets/**` and versioned bundles; don't hand-edit generated public assets for source changes.
- `Modules/Test` has its own Vite build (`Modules/Test/package.json`, `Modules/Test/vite.config.js`) outputting `public/build-test`; root npm scripts do not build it.
- Node.js v17+ requires `$env:NODE_OPTIONS="--openssl-legacy-provider"` before `npx mix` (OpenSSL v3 incompatibility with file-loader). Only relevant if the user asks you about it.

## Routes and boundaries
- Main web routes are in `routes/web.php`; API routes are in `routes/api.php` with controllers under `app/Http/Controllers/API/**`.
- `routes/web.php` is wrapped in `freshInstall`; most logged-in admin work is under `/admin` with `role:admin`, `valid.user`, `multi_tenant`, and `subscription`.
- Super-admin work is under `/sadmin` with `role:super_admin`; dashboards are `/sadmin/dashboard` and `/admin/dashboard`.
- Module support is nwidart/laravel-modules; activation is file-based in `modules_statuses.json`, and root Composer merges `Modules/*/composer.json`.
- Module `Test` is a sample module with `/test` web route and `/api/test`; module providers load module routes, views, config, and migrations.

## Data conventions
- `app/helpers.php` is autoloaded and contains domain helpers like `currencyFormat`, `getCurrentSubscription`, `checkFeature`, and `getSuperAdminSettingValue`; check it before adding duplicate helpers.
- Many domain models use `tenant_id`; admin/API code usually scopes queries with `getLogInTenantId()` in addition to model traits.
- Local/public filesystem disks both point at `public/uploads`; `.env.example` sets `MEDIA_DISK=public`.

## Style/config
- StyleCI uses the Laravel preset, disables `no_unused_imports`, excludes `index.php`, `server.php`, and `webpack.mix.js`, and enables CSS checks.
- No CI, pre-commit, task runner, Cursor/Claude/opencode instruction files were found.
