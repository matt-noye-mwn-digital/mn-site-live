#!/bin/bash

# Add this section to print environment variables to a log file
env > "/home/sites/31a/6/6d0de60baf/public_html/environment.log"
LOG_FILE="/home/sites/31a/6/6d0de60baf/public_html/deployment.log"

log() {
    echo "$(date '+%Y-%m-%d %H:%M:%S') $1" >> "$LOG_FILE"
}

log "Starting deployment..."

log "Pulling the latest changes from GitHub..."
git pull origin main

log "Installing/Updating Composer dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

log "Running database migrations and seeders..."
php artisan migrate --force
php artisan db:seed --force

log "Optimizing Laravel..."
php artisan optimize

log "Clearing cache..."
php artisan cache:clear
php artisan config:cache

log "Deployment completed."


