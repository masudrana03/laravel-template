#!/bin/bash




# Step 3: Switch to the adminlte-4 branch
echo "Switching to the adminlte-4 branch..."
git checkout adminlte-4
if [ $? -ne 0 ]; then
    echo "Failed to switch branches!"
    exit 1
fi

# Step 4: Copy the .env file
echo "Copying .env file..."
cp .env.example .env
if [ $? -ne 0 ]; then
    echo "Failed to copy .env file!"
    exit 1
fi

# Step 5: Install PHP dependencies
echo "Installing PHP dependencies via Composer..."
composer install
if [ $? -ne 0 ]; then
    echo "Composer install failed!"
    exit 1
fi

# Step 6: Generate application key
echo "Generating application key..."
php artisan key:gen
if [ $? -ne 0 ]; then
    echo "Failed to generate application key!"
    exit 1
fi

# Step 7: Install Node.js dependencies
echo "Installing Node.js dependencies..."
npm install
if [ $? -ne 0 ]; then
    echo "npm install failed!"
    exit 1
fi

# Step 8: Build assets
echo "Building the assets..."
npm run build
if [ $? -ne 0 ]; then
    echo "npm build failed!"
    exit 1
fi

# Final message
echo "Laravel project setup is complete!"
