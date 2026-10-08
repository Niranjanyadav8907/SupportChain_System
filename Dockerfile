FROM dunglas/frankenphp:php8.3

WORKDIR /app

RUN install-php-extensions \
    pdo_mysql \
    mbstring \
    bcmath \
    exif \
    pcntl \
    intl \
    zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Node.js + npm
COPY --from=node:22 /usr/local/bin/node /usr/local/bin/node
COPY --from=node:22 /usr/local/lib/node_modules /usr/local/lib/node_modules

RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

COPY . /app

COPY isrgrootx1.pem /app/isrgrootx1.pem

RUN composer install --no-dev --optimize-autoloader

RUN npm ci && npm run build

RUN php artisan storage:link || true

RUN chmod -R 775 storage bootstrap/cache

COPY Caddyfile /etc/caddy/Caddyfile

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]