# Usar uma imagem oficial do PHP com Apache
FROM php:8.1-apache

# Instalar dependências do sistema e extensões PHP necessárias para Laravel + PostgreSQL
RUN apt-get update && apt-get install -y \
    curl unzip git libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && a2enmod rewrite

# Definir o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Copiar apenas os arquivos essenciais para o Composer primeiro (melhora o cache)
COPY sistema-apoio-psicologico/composer.json sistema-apoio-psicologico/composer.lock ./


# Baixar e instalar o Composer corretamente
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    mv composer.phar /usr/local/bin/composer && \
    rm composer-setup.php

# Rodar o Composer para instalar dependências do Laravel
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader

# Agora copiar o restante dos arquivos do projeto Laravel
COPY . ./

# Definir permissões para storage e cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Expor a porta 80 (Apache)
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
