# Wizkid Manager 2000

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/installation)

Alternative installation is possible without local dependencies relying on [Laravel Sail (Docker)](#laravel-sail).

Clone the repository

    git clone git@github.com:iDiegoNL/wizkid-manager-2000.git

Switch to the repo folder

    cd wizkid-manager-2000

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:iDiegoNL/wizkid-manager-2000.git
    cd wizkid-manager-2000
    composer install
    cp .env.example .env
    php artisan key:generate

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data which includes Wizkid entries. This can help you to quickly start testing the application.**

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

## Laravel Sail

To install with [Docker](https://www.docker.com), run following commands:

```
git clone git@github.com:iDiegoNL/wizkid-manager-2000.git
cd wizkid-manager-2000
cp .env.example .env
./sail-initial-setup.sh
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
```

The application can be accessed on your [localhost](http://localhost).
