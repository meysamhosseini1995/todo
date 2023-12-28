<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Todo

This project was created at the request of Heli Technology company for my testing purposes. I used last Laravel and Sail in this project to make it easily testable in an isolated Docker environment.

First, get the project from Git

Then run the following commands in the project path

* Make sure Docker is up to date on your system









## Installation

Install todo project

```bash
  cd my-project

  composer install

  cp .env.example .env

  php artisan key:generate

  ./vendor/bin/sail up -d
```


Wait for your Docker to install then

```bash
  ./vendor/bin/sail artisan migrate --seed
```
## Environment Variables

To run this Broadcast in this project, you will need to register one channel in pusher and add the following environment variables to your .env


`PUSHER_APP_ID`

`PUSHER_APP_KEY`

`PUSHER_APP_SECRET`

`PUSHER_APP_CLUSTER`
## Documentation

I have prepared the project documentation in Postman for you to use if needed.

[Documentation](https://documenter.getpostman.com/view/1976063/2s9YkuYxk7)


![Logo](https://raw.githubusercontent.com/meysamhosseini1995/todo/main/public/doc.png)


## Support

For support, email meysamhosseini1995@gmail.com or join our Slack channel.
