FROM existenz/webstack:8.1

RUN apk add --no-cache php81-openssl \
php81-session \
php81 \
php81-posix \
php81-tokenizer \
php81-pdo \
php81-pdo_mysql \
php81-zip \
php81-xml \
php81-simplexml \
php81-fileinfo \
php81-xmlreader \
php81-xmlwriter \
php81-iconv \
php81-mbstring \
php81-curl \
libstdc++ \
libpq \
php81-pecl-swoole \
php81-pcntl \
supervisor
COPY --chown=php:nginx . /www
COPY .docker/php.ini /etc/php81/php.ini
COPY .docker/vhost.conf /etc/nginx/nginx.conf
#RUN php81 artisan down
RUN php81 artisan optimize
#RUN php81 artisan up
RUN mkdir -p /etc/supervisor.d/
COPY .docker/supervisord.ini /etc/supervisor.d/supervisord.ini
USER root
CMD ["supervisord", "-c", "/etc/supervisor.d/supervisord.ini"]
