FROM php:8.3-fpm

# Define the hardcoded user and UID
ENV USER=myuser
ENV UID=1000

# Install necessary system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install zip pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application code
COPY . /var/www/html

# Install PHP dependencies
RUN composer install

RUN useradd -G www-data,root -u ${UID} -d /home/${USER} ${USER}
RUN mkdir -p /home/${USER}/.composer && \
    chown -R ${USER}:${USER} /home/${USER} && \
    chmod +x entrypoint.sh && \
    chown -R ${USER}:${USER} /var/www/html/storage /var/www/html/bootstrap/cache

USER ${USER}
