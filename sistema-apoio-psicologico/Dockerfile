# Usar uma imagem oficial do PHP com o Apache (versão estável)
FROM php:8.1-apache

# Instalar dependências do sistema, além do PHP e extensões necessárias para Laravel
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git libxml2-dev libicu-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql opcache intl && \
    a2enmod rewrite

# Definir o diretório de trabalho dentro do container
WORKDIR /var/www/html

# Copiar os arquivos do seu projeto Laravel para o diretório de trabalho
COPY . .

# Instalar o Composer (gerenciador de dependências PHP)
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# Rodar o Composer para instalar as dependências do Laravel
RUN composer install --optimize-autoloader --no-dev

# Configurar permissões adequadas para os diretórios storage e bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expor a porta 80, que é a porta padrão do Apache
EXPOSE 80

# Definir o comando que inicia o Apache no modo foreground
CMD ["apache2-foreground"]
