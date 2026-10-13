#!/bin/sh
set -e

echo "=== شروع راه‌اندازی وردپرس ==="

# Give WordPress a moment to be fully ready
sleep 3

# Install WordPress if not already installed
if ! wp core is-installed --allow-root 2>/dev/null; then
  echo "در حال نصب وردپرس..."
  wp core install \
    --allow-root \
    --url="${WP_URL:-http://localhost:3000}" \
    --title="دنیای هوش مصنوعی" \
    --admin_user=admin \
    --admin_password=admin123 \
    --admin_email=admin@example.com \
    --skip-email
  echo "وردپرس نصب شد."
else
  echo "وردپرس قبلاً نصب شده است."
fi

# Permalink structure
wp rewrite structure '/%postname%/' --allow-root --hard
wp rewrite flush --allow-root --hard

# Activate theme
wp theme activate donya-ai --allow-root

# Clean up default plugins/themes
wp plugin delete hello akismet 2>/dev/null || true
wp theme delete twentytwentyfour twentytwentythree twentytwentytwo twentytwentyone twentytwenty 2>/dev/null || true

# Install essential free plugins
echo "نصب افزونه‌ها..."
wp plugin install wp-parsidate   --activate --allow-root 2>/dev/null || echo "افزونه wp-parsidate نصب نشد (احتمالاً مشکل شبکه)"
wp plugin install wordpress-seo  --activate --allow-root 2>/dev/null || echo "افزونه Yoast SEO نصب نشد"
wp plugin install contact-form-7 --activate --allow-root 2>/dev/null || echo "افزونه Contact Form 7 نصب نشد"

# Run PHP content setup
echo "ایجاد دسته‌بندی‌ها، صفحات و محتوا..."
wp eval-file /scripts/setup.php --allow-root

echo "=== راه‌اندازی کامل شد ==="
