# دنیای هوش مصنوعی — WordPress Site

## Overview
Persian (Farsi) AI news/education/tools website built with WordPress, running in Docker Compose.

## Architecture
- **wordpress** — Official `wordpress:php8.2-apache` image, served on port 3000
- **db** — MySQL 8.0 database
- **setup** — One-shot `wordpress:cli` container that installs WordPress, activates the theme, creates categories/pages/posts/menu via `scripts/setup.sh` + `scripts/setup.php`

## Theme
Custom lightweight theme at `wp-content/themes/donya-ai/`:
- RTL Persian layout, Vazirmatn font (Google Fonts CDN)
- Dark navy primary (#0f172a), indigo accent (#6366f1)
- Dark mode toggle (localStorage)
- Templates: front-page, index, single, archive, page, search, 404
- Card-based post grid, responsive (mobile/tablet/desktop)

## Setup
```bash
docker compose -f docker-compose.base44.yml up -d --build
```
The setup container runs automatically on first boot and creates all content.

## Admin Access
- URL: `https://3000-<preview-host>/wp-admin`
- Username: `admin`
- Password: `admin123`

## Key Details
- `WP_HOME`/`WP_SITEURL` are set dynamically via `WORDPRESS_CONFIG_EXTRA` using `BASE44_PUBLIC_HOST_SUFFIX`
- HTTPS is detected via `X-Forwarded-Proto` header (preview proxy)
- Permalink structure: `/%postname%/`
- Plugins installed: wp-parsidate (Persian dates), Yoast SEO, Contact Form 7
- Theme files are bind-mounted; edits take effect on next page load (PHP interpreted)
