# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Habilita o mod_rewrite do Apache (necessário para projetos como Laravel)
RUN a2enmod rewrite

# Configura o ServerName para localhost
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copia o código do projeto para o diretório do Apache
COPY . /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Instala as dependências do Composer
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --verbose

# Define permissões para o diretório do projeto (se necessário)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configura o Apache para usar a pasta "public" como raiz
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Executa as migrations e seeders antes de iniciar o servidor
CMD php artisan migrate --seed --force && apache2-foreground

# Expõe a porta 80 (padrão do Apache)
EXPOSE 80
