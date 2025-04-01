# Utiliser l'image officielle PHP avec Apache
FROM php:8.2-apache

# Installer les extensions nécessaires
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Activer mod_rewrite pour Apache
RUN a2enmod rewrite

# Copier les fichiers du projet dans le conteneur
COPY . /var/www/html/

# Changer les permissions
RUN chown -R www-data:www-data /var/www/html/

# Exposer le port 80
EXPOSE 80

# Lancer Apache en mode foreground
CMD ["apache2-foreground"]