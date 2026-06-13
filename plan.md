# Rebranding Plan: InfyOm/Erag → Qrenda

## Branding Decisions
- **App name**: Qrenda (replaces InfyVCards-SaaS)
- **Company**: Qrenda (replaces InfyOm Technologies)
- **Keep `erag/installererag`** package as-is (vendor files)
- **Keep `config/infyom/`** directory name, edit content only
- **Docs footer**: Replace social links with placeholders (TBD)

---

## Phase 0: Backup & Baseline
1. `git add -A && git commit -m "backup before rebranding to Qrenda"`
2. `vendor/bin/phpunit` — record baseline results
3. `php artisan migrate --force` — confirm DB is reachable
4. `php artisan db:seed --force` — confirm seeders work

---

## Phase 1: Environment & Config

### Step 1.1 — `.env`
- line 5: `APP_URL=http://infyom.com` → `APP_URL=http://localhost`
- line 6: `APP_DOMAIN=infyom.com` → `APP_DOMAIN=localhost`

### Step 1.2 — `.env.example`
- line 5: `APP_URL=http://infyom.com` → `APP_URL=http://localhost`
- line 6: `APP_DOMAIN=infyom.com` → `APP_DOMAIN=localhost`

### Step 1.3 — `composer.json`
- line 2: `"name": "laravel/laravel"` → `"name": "qrenda/qrenda"`
- line 4: `"description": "The Laravel Framework."` → `"description": "Qrenda - Digital Business Card SaaS"`
- Keep repositories block and `erag/installererag` requirement as-is

### Step 1.4 — `config/infyom/laravel_generator.php`
- line 46: `resource_path('infyom/infyom-generator-templates/')` → `resource_path('generator/generator-templates/')`

### Step 1.5 — `config/app.php`
- line 186: Keep `InstallerErag\InstallerServiceProvider::class` as-is

### Verify
- `php artisan config:cache` succeeds
- `php artisan route:clear` succeeds

---

## Phase 2: Database Seeders & Migrations

### Step 2.1 — `database/seeders/SettingsTableSeeder.php`
- line 15: `'/assets/images/infyom-logo.png'` → `'/assets/images/logo.png'`
- line 16: `'/web/media/logos/favicon-infyom.png'` → `'/web/media/logos/favicon.png'`
- line 19: `'InfyVCards-SaaS'` → `'Qrenda'`

### Step 2.2 — `database/seeders/HomePageSeeder.php`
- line 17: `'InfyVCards-SaaS'` → `'Qrenda'`

### Step 2.3 — `database/migrations/2024_02_06_092822_add_dashboard_logo_in_setting_table.php`
- line 15: `'assets/images/infyom-logo60x60.png'` → `'assets/images/logo60x60.png'`

### Verify
- `php artisan migrate --force` (no errors)
- `php artisan db:seed --force` (no errors)

---

## Phase 3: PHP Source Code

### Step 3.1 — `app/Models/Vcard.php`
- line 437: `favicon-infyom.png` → `favicon.png`

### Step 3.2 — `app/Http/Controllers/API/AuthAPIController.php`
- line 101: Update Flutter package name in comment from `com.example.infyvcards_flutter` to your app's identifier

### Verify
- `php -l app/Models/Vcard.php` — no syntax errors
- `php -l app/Http/Controllers/API/AuthAPIController.php` — no syntax errors

---

## Phase 4: Blade Templates

### Step 4.1 — `resources/views/settings/home_page_settings.blade.php`
- line 135: `infyom-logo.png` → `logo.png`
- line 161: `favicon-infyom.png` → `favicon.png`
- line 187: `favicon-infyom.png` → `favicon.png`
- line 214: `infyom-logo.png` → `logo.png`

### Step 4.2 — `resources/views/settings/front_cms/fields.blade.php`
- line 15: `infyom-logo.png` → `logo.png`

### Step 4.3 — `resources/views/user-settings/general.blade.php`
- line 135: `favicon-infyom.png` → `favicon.png`

### Step 4.4 — `resources/views/vcards/vcard11/contact.blade.php`
- line 148: Replace Google Maps embed URL containing `InfyOm%20Technologies` with your address or remove

### Step 4.5 — `resources/views/vcards/vcard11/header.blade.php`
- lines 20, 22, 25, 28, 31, 34, 37, 40, 43: Replace `hms.infyom.com` flag image URLs with CDN

### Step 4.6 — `resources/views/vcards/vcard17.blade.php`
- lines 792-793: Remove or replace `https://vcards.infyom.com/marlonbrasil` links

### Step 4.7 — `resources/views/vcards/vcard22.blade.php`
- lines 894-896: Remove or replace `https://vcards.infyom.com/marlonbrasil` links

### Verify
- `php artisan view:clear` succeeds
- No compilation errors

---

## Phase 5: JS Source + Recompile

### Step 5.1 — `resources/assets/js/ecard/ecard.js`
- line 212: `"/web/media/logos/infyom.png"` → `"/web/media/logos/logo.png"`
- line 674: `"/web/media/logos/infyom.png"` → `"/web/media/logos/logo.png"`

### Step 5.2 — Recompile
- `npm run dev` — must exit with code 0

### Verify
- `npm run dev` succeeds
- Check `public/mix-manifest.json` is updated

---

## Phase 6: Image Files — Safe Two-Step

### Step 6a — Copy to new names (both old and new coexist)
1. Copy `public/assets/images/infyom-logo.png` → `public/assets/images/logo.png`
2. Copy `public/assets/images/infyom-logo60x60.png` → `public/assets/images/logo60x60.png`
3. Copy `public/web/media/logos/favicon-infyom.png` → `public/web/media/logos/favicon.png`
4. Copy `public/web/media/logos/infyom.png` → `public/web/media/logos/logo.png`

### Step 6b — Verify
- Load any page referencing these images — confirm both old and new paths work

### Step 6c — Remove old files
- Delete the 4 old `infyom-*` / `infyom.*` files

---

## Phase 7: Documentation Site

### Step 7.1 — `docs/index.html`
- line 6: `<title>InfyVcards-SaaS</title>` → `<title>Qrenda</title>`
- line 47: `<h4>InfyVcards-SaaS</h4>` → `<h4>Qrenda</h4>`
- line 72: `InfyVcards-SaaS is Multi user...` → update to `Qrenda is a Multi user...`
- lines 478-485: Replace social links (Twitter, Facebook, LinkedIn, GitHub) with placeholders
- line 492: `by InfyOm Technologies` → `by Qrenda`
- lines 493-498: Replace company blurb with your text
- line 504: Update copyright link and company name

### Step 7.2 — `docs/404.html`
- line 6: `<title>InfyVcards-SaaS</title>` → `<title>Qrenda</title>`

### Step 7.3 — `docs/config.html`
- line 6: `<title>InfyVcards-SaaS</title>` → `<title>Qrenda</title>`
- line 24: `alt="InfyVcards-SaaS"` → `alt="Qrenda"` and `InfyVcards-SaaS</span>` → `Qrenda</span>`

### Step 7.4 — `docs/docs/index.html`
- line 6: `<title>Guide | InfyVcards-SaaS</title>` → `<title>Guide | Qrenda</title>`
- line 47-48: `alt="InfyVcards-SaaS"` → `alt="Qrenda"` and `InfyVcards-SaaS</span>` → `Qrenda</span>`

### Step 7.5 — `docs/releases/index.html`
- line 6: `<title>Releases | InfyVcards-SaaS</title>` → `<title>Releases | Qrenda</title>`
- line 47-48: `alt="InfyVcards-SaaS"` → `alt="Qrenda"` and `InfyVcards-SaaS</span>` → `Qrenda</span>`
- line 606: `href="https://infyom.com/infyvcards-saas/docs/releases"` → remove or replace

### Step 7.6 — `docs/upgrade/index.html`
- line 6: `<title>Upgrade Guide | InfyVcards-SaaS</title>` → `<title>Upgrade Guide | Qrenda</title>`
- line 47-48: `alt="InfyVcards-SaaS"` → `alt="Qrenda"` and `InfyVcards-SaaS</span>` → `Qrenda</span>`
- line 739: `href="https://infyom.com/infyvcards-saas/docs/upgrade-guide"` → remove or replace

### Step 7.7 — `docs/js/3.js`
- Replace `InfyProjects` and `InfyOm Technologies` strings with `Qrenda`

---

## Phase 8: Final Verification
1. `php artisan config:cache` — no errors
2. `php artisan route:cache` — no errors
3. `php artisan route:list` — spot-check key routes
4. `php artisan migrate --force` — no errors
5. `php artisan db:seed --force` — no errors
6. `vendor/bin/phpunit` — same results as baseline (no regression)
7. `npm run dev` — compiles successfully
8. Browser check: load admin and front-end pages, verify no broken image paths

---

## Risk Mitigation

| Risk | Mitigation |
|------|-----------|
| Broken image paths | Phase 6 copies before updating references; old files removed last |
| Composer autoload breakage | Keep `erag/installererag` and `config/infyom/` directory names unchanged |
| Seeded data mismatch | Seeders only affect fresh installs, not existing tenants |
| Docs have external URLs | Replaced with `YOUR_*_HERE` placeholders for you to fill |
| JS compilation fails | Stop on Phase 5 if `npm run dev` fails — no further changes |
| Git rollback needed | Backup commit in Phase 0; `git reset --hard HEAD~1` reverts all |
