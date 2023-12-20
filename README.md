# ECommerce Platform

Uses Laravel 10

## Installation
1. If you have installed Xampp, navigate to `xampp/php/php.ini` and edit the file to remove comment for `extension=zip` to avoid an error when running composer install.

1. clone or fork the repository \
    `git clone git@github.com:AlexAaqil/Online-Shop.git`
1. Change directory to the path with the project files and run the following commands: \
    `composer install`\
    `npm install`

1. Copy the .env.example into a file named `.env`
1. Generate the application key: \
    `php artisan key:generate`
1. Create your database and run the migrations together with the seeder \
    `php artisan migrate --seed`
1. Create a symbolic link for the uploaded images to work \
    `php artisan storage:link`
