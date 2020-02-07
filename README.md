# King of the Lunch API


## About

This repository is a part of a _show off_ project named "**King of the Lunch**"
("Rei do Lanche" em Português).

Every day there will be an election for applicants for the title "King of the Lunch". Such an election is open for voting between 10:00 am and 12:00 pm. Then at 12:01 pm the votes are counted, and a new King is elected (although one can be elected King more than once).

A given applicant must apply for the elections by registering his **name** and **e-mail** (only one applicant per e-mail is permitted).

### Future features

* Configure application if it should open voting in now work days.
* Ask for some id (email, Facebook id,...) to prevent the same user to vote more than once.

## Setting up

As previously mentioned, this project is part of major project called "**King of the Lunch**". Please take a look at docker project : [Docker Infrastructure](https://github.com/fabricioyukio/kotl-docker) before you start.

Also check [Web](https://github.com/fabricioyukio/kotl-web) - A ReactJS app to work as a GUI/Frontend for this API.

### With or without Docker Infrastructure?

The "Docker Infrastructure" project have been made as a way of providing a development environment in order to standardize the process of developing independent of your current OS and provide a quick '*hands-on*' on coding!

Without the "Docker Infrastructure" project, you have to provide all the required dependencies (php 7.2, Laravel 6, Redis, MySQL, etc...) in order to make it happen.

#### With Docker Infrastructure

In your favorite shell (iterm, zsh, git-gui,...) just prefix all commands with "**docker exec api -it {your_command}**". Example:

```bash
composer install
```

You should do as:

```bash
# it might appear a little more cumbersome, but you might just run commands
# from any available shell window
docker exec api -it composer install
```

#### Without Docker Infrastructure

You will need to navigate to within **application directory** in the server instance (VM, Remote server, Vagrant Machine) order to run commands. 

### Getting started

#### Vendor modules

Get required vendor modules with composer:

```bash
composer install
```

#### Set env file and application key

First of all you must make an ***.env*** file, by copying **.env.example** file:

```bash
# copy file
cp .env.example .env
# generate key
php artisan key:generate
```

Then edit the newly created **.env** file, adjusting parameters where needed.

```ini
# /.env
APP_NAME=kotl-api
APP_ENV=local
APP_KEY=SOME_HASH_CREATED
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=check_on_docker_file
DB_USERNAME=check_on_docker_file
DB_PASSWORD=check_on_docker_file

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

##### Macte animo!

You are almost there!

#### Run migrations and seeds

```bash
# migrations to create tables
php artisan migrate
# seeds to initial population of seeds
php artisan db:seed
```

##### Reseting DB

You might be running experimentations with the DB, it might get some inconsistencies. Whenever it happens I would recommend you to reset database*.

Anyways. Should ever need to reset the database run:
```bash
php artisan migrate:refresh --seed
```

> Remember that it's not a production ready project, nor a state of art boilerplate...



## Security Vulnerabilities and bugs

If you ever discover a security vulnerability or bug within this project, please feel free to create an **issue**, and will check it as soon as I have some spare time to check it out. All security vulnerabilities will not be promptly addressed, as it should not be a boilerplate project or base for your future enterprise endeavor.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Made with
<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>
<p align="center">6.1.4</p>
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.
