# Laravel Shadcn/Vue Starter Kit

A Laravel 13 starter kit wired for Inertia.js + Vue 3 with shadcn/vue components, Tailwind CSS v4, and a practical local dev stack.

## Stack

- Backend: Laravel 13, Fortify, Inertia.js (Laravel adapter)
- Frontend: Vue 3, shadcn/vue (reka-ui), Tailwind CSS v4
- Tooling: Vite, TypeScript, ESLint, Prettier, Pint, PHPStan, Rector
- Extras: Ziggy, Mailpit, Reverb-ready scripts

## Requirements

- PHP 8.4+
- Composer
- Bun (recommended) or Node 22+
- A database (SQLite/MySQL/Postgres)

## Quick start

```bash
composer run setup
```

This installs PHP/JS deps, creates `.env`, generates an app key, runs migrations, and builds assets.

## Development

```bash
composer run dev
```

Runs Vite + queue worker + scheduler + Mailpit in one terminal.

If you are using Laravel Herd:

```bash
composer run herd:dev
```

## Docker (dev)

```bash
docker compose up --build --no-cache
```

- App: http://localhost:8080
- Mailpit: http://localhost:8025

By default, the Docker setup uses MariaDB.

## Environment & Database

Copy `.env.example` to `.env` and adjust your database and mail settings. The setup script handles the initial copy automatically.

### Database configuration

Depending on your environment, update these values in your `.env` file:

**SQLite (Local default)**
```env
DB_CONNECTION=sqlite
# DB_DATABASE=laravel (not needed for SQLite by default)
```

**MariaDB (Docker default)**
```env
DB_CONNECTION=mariadb
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

**MySQL**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

## Useful scripts

```bash
composer run format     # Pint + Prettier + ESLint
composer run analyse    # PHPStan
composer run test       # PHPUnit
composer run rector     # Rector fixes
```

## Frontend structure

- `resources/js/Pages` for Inertia pages
- `resources/js/Components` for shared components
- `resources/js/Components/ui` for shadcn/vue components

## Inertia + Vue

Server-side routes live in `routes/web.php` and render Inertia pages that map to Vue files under `resources/js/Pages`.

## shadcn/vue

shadcn/vue components are generated into `resources/js/Components/ui` and styled with Tailwind. Configure components via `components.json`.

## License

MIT
