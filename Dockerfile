# Usar uma imagem oficial do PHP com Apache
FROM php:8.1-apache

# Instalar dependências do sistema e extensões PHP necessárias para Laravel + PostgreSQL
RUN apt-get update && apt-get install -y \
    curl unzip git libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && a2enmod rewrite

# Definir o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Copiar apenas os arquivos essenciais para o Composer (otimiza o cache)
COPY composer.json composer.lock ./

# Baixar e instalar o Composer corretamente
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    mv composer.phar /usr/local/bin/composer && \
    rm composer-setup.php

# Rodar o Composer para instalar dependências do Laravel
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --verbose

# Copiar o restante dos arquivos do projeto Laravel
COPY . ./

# Definir permissões para storage e cache
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Criar o link do storage (corrige erro ao acessar arquivos públicos)
RUN php artisan storage:link || true

# Gerar a chave da aplicação
RUN php artisan key:generate

# Rodar as migrations automaticamente
RUN php artisan migrate --force || true

# Expor a porta 80 (Apache)
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
