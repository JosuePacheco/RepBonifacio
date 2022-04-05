# API REST SINVJ

Installation and execution of REST API for consumption in react native.

## Packages

- Laravel 8
- PHP 7.3 or higher

## Endpoints

- https://documenter.getpostman.com/view/17762157/UVJbJe1M

# How to use

## Install

Clone the repo

```
$ git clone https://github.com/B0nifaci0/apisinvjapp.git
```

Change directory to the cloned repo

```
$ cd apisinvjapp
```

Install required packages

```
$ composer install

In case of incompatibility, replace with the following command

$ composer install --ignore-platform-reqs

```

Create environment variable

```
cp .env.example .env
```

- Edit the newly created .env file and add your database details

Run migration

```
php artisan migrate:refresh --seed

```

Run

```
php artisan key:generate
php artisan jwt:secret
```

Start the application

```
php artisan serve --host=0.0.0.0


```

Use the provided endpoints in the link above to explore the application and start building.

Cheers!
