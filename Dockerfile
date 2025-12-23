# Use official PHP with Apache
FROM php:8.2-apache

# Set working directory inside the container
WORKDIR /var/www/html

# Install PHP extensions needed for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy all website files into the container
COPY . .

# Expose HTTP port
EXPOSE 80

# Run Apache in the foreground (similar to ENTRYPOINT)
ENTRYPOINT ["apache2-foreground"]
