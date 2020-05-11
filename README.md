# Task Management App

> ### This web application let's you manage your tasks include CRUD operations, associating task to project & drag & drop functionality.

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation can be found here](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

    git clone git@github.com:kissartisan/task-management.git

Switch to the repo folder

    cd task-management

Install all the PHP dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Install all the Javascript dependencies using npm

    npm install

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:kissartisan/task-management.git
    cd task-management
    composer install
    cp .env.example .env
    php artisan key:generate
    npm install

**Make sure you set the correct database connection information before running the migrations.** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes tasks with an associated project. This can help you to quickly start testing the application and start using it with ready content.**

Open the TaskSeeder and set the $numberOfTasks values as per your liking

    database/seeds/TaskSeeder.php

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:fresh

----------

# Code overview

## Added Dependencies

- [laravel/ui](https://github.com/laravel/ui) - For Frontend Scaffolding

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the controllers
- `app/Http/Requests` - Contains all the form requests
- `database/factories` - Contains the model factory for Project & Task
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder for Task
- `resources/js` - Contains all the Javascript/Vue files
- `resources/sass` - Contains basic styling (app.scss file)
- `resources/views` - Contains all the blade files
- `routes` - Contains all the routes defined in web.php file

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file.
