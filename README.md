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

### External API's

To ease our development we will integrate some services from third parties.

#### Calendario.com.br

Utilizaremos o serviço que informa os feriados nacionais por cidade. Para obter as credenciais de acesso, siga o link:
http://www.calendario.com.br/api_feriados_municipais_estaduais_nacionais.php

#### Mailtrap.io

Mailtrap provides a free use of their for development purposes. Just go to https://mailtrap.io to get you keys!

#### Pusher

Pusher enable us to send push notifications to the front-end App if such is capable.

#### Redis

We use Redis queues to provide scalability.

Some non-urgent actions are enqueued so that application avoids _"hicups"_ :)

### Using kotl-docker

If you are using the [Docker Infrastructure](https://github.com/fabricioyukio/kotl-docker), you may skip the rest of this section.

Except that you still need to adjust the **.env** file from this project.

### Setup commands

Navigate to this project directory using your favorite shell and follow the instructions...

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

#### Macte animo

You are almost there!

#### Run migrations and seeds

```bash
# migrations to create tables
php artisan migrate
# seeds to initial population of seeds
php artisan db:seed
```

Or simply run

```bash
php artisan migrate:fresh --seed
```

##### Reseting DB

You might be running experimentations with the DB, it might get some inconsistencies. Whenever it happens I would recommend you to reset database*.

Anyways. Should ever need to reset the database run:
```bash
php artisan migrate:refresh --seed
```

#### Start laravel server

Run this command only if your are not using the Docker infrastructure.

```bash
php artisan serve
```

Start queue

```bash
php artisan queue:listen
```

> Remember that it's not a production ready project, nor a state of art boilerplate...

## Security Vulnerabilities and bugs

If you ever discover a security vulnerability or bug within this project, please feel free to create an **issue**, and will check it as soon as I have some spare time to check it out. All security vulnerabilities will not be promptly addressed, as it should not be a boilerplate project or base for your future enterprise endeavor.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Made with

[![vscode][1]][2]

[1]: public/assets/vscode_icon.svg
[2]: https://code.visualstudio.com/ "Get VSCode"

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

## The KotL Project Repositories

* [kotl-docker](https://github.com/fabricioyukio/kotl-docker) - A minimal docker infrastructure for Api.
* [kotl-api-php](https://github.com/fabricioyukio/kotl-api-php) - Laravel API for the project.
* [kotl-web](https://github.com/fabricioyukio/kotl-web) - a responsive Web App that will run as main frontend for the project.
