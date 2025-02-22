# Usar uma imagem oficial do PHP com Apache
FROM php:8.1-apache

# Instalar dependências do sistema e extensões PHP necessárias para Laravel + PostgreSQL
RUN apt-get update && apt-get install -y \
    curl unzip git libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && a2enmod rewrite

# Definir o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Copiar os arquivos do projeto (se estiver dentro de uma subpasta, ajuste aqui)
COPY sistema-apoio-psicologico/ . 

# Instalar o Composer e rodar `composer install`
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Definir permissões para storage e cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expor a porta 80 (Apache)
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
