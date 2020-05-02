FROM php:7.4-apache
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"\
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"\
    && php composer-setup.php\
    && php -r "unlink('composer-setup.php');"\
    && mv composer.phar /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN apt-get update \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y libzip-dev \
    && apt-get install -y unzip \
    && docker-php-ext-install zip \
    && apt-get install -y vim \
    && docker-php-ext-install pdo_mysql
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
WORKDIR /var/www/html
RUN composer global require "laravel/installer"
RUN a2enmod rewrite
