# AGENTS.md

## Build/Lint/Test Commands

### Build Commands

- `npm run build` - Build frontend assets for production
- `npm run build:ssr` - Build with SSR support
- `composer run setup` - Full project setup (install deps, migrate, build)

### Development Commands

- `npm run dev` - Start Vite dev server
- `composer run dev` - Start full dev environment (server + queue + logs + vite)

### Lint & Format Commands

- `npm run lint` - Run ESLint with auto-fix
- `npm run format` - Format code with Prettier
- `npm run format:check` - Check Prettier formatting

### Test Commands

- `composer run test` - Run all Pest tests
- `php artisan test --filter="test_name"` - Run single test
- `vendor/bin/pest --filter="test_name"` - Run single test with Pest directly

## Code Style Guidelines

### Frontend (TypeScript/Vue)

- **Formatting**: Prettier with 4-space indentation, 150 char width, semicolons, single quotes
- **Linting**: ESLint with Vue 3 + TypeScript, Prettier integration
- **Imports**: Auto-organized with prettier-plugin-organize-imports
- **Styling**: Tailwind CSS with clsx/tailwind-merge utilities (`cn()` helper)
- **Vue**: Composition API with `<script setup lang="ts">`
- **TypeScript**: Strict mode, ESNext target, path aliases (`@/*` → `./resources/js/*`)
- **Naming**: camelCase for variables/functions, PascalCase for components

### Backend (PHP)

- **Testing**: Pest framework with Laravel integration
- **Structure**: PSR-4 autoloading, Laravel conventions
- **Code Style**: Laravel Pint (PHP CS Fixer based)
- **Models**: Standard Laravel Eloquent patterns

### General

- **Indentation**: 4 spaces
- **Quotes**: Single quotes in JS/TS
- **Semicolons**: Required in JS/TS
- **Error Handling**: Try-catch blocks, Laravel's exception handling
- **Types**: Strict typing in TypeScript, PHPDoc in PHP where needed
