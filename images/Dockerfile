# Use PHP with Apache
FROM php:8.1-apache

# Enable mod_rewrite (if you need it)
RUN a2enmod rewrite

# Copy all files from current dir to Apache root
COPY . /var/www/html/

# Set working dir
WORKDIR /var/www/html/

# Expose Apache port
EXPOSE 80
