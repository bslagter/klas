FROM composer
COPY . /app
RUN composer install --ignore-platform-reqs
ENTRYPOINT [ "php", "run.php" ]
