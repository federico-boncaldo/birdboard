# Birdboard

This project is based on [Build A Laravel App With TDD](https://laracasts.com/series/build-a-laravel-app-with-tdd) by Jeffrey Way.
The repository of the original project can be found [here](https://github.com/laracasts/birdboard).

It consists of a project management web application which allows to create, edit and delete projects.
Each project can contain tasks that can be marked as complete.

From the project page, the owner can invite new users who will have only the permission to edit the project.

Within the project page, is possible as well to add general notes and visualise all user actions related to that project.

## Requirements

The project requires [Composer](https://getcomposer.org/download/) and [npm](https://www.npmjs.com/get-npm) to install all the dependencies.
[Vagrant](https://www.vagrantup.com/downloads.html) is necessary together with a compatible hypervisor (you can find a list [here](https://laravel.com/docs/6.x/homestead#first-steps) ) if the user wants to run the project in a development environment with [Laravel Homestead](https://laravel.com/docs/6.x/homestead)
Otherwise please refer to the [server requirements](https://laravel.com/docs/6.x/installation#server-requirements) in Laravel documentation.

## Local environment configuration

It is possible to use [Laravel Homestead](https://laravel.com/docs/6.x/homestead) for the development environment.
Please check out the documentation linked above to run the project.

## Configuration

Clone the repository with:

`git clone https://github.com/federico-boncaldo/birdboard.git`

Once the project is on your machine run:

`composer install`

To download all necessary PHP packages of the project, then run:

`npm install`

For all the Javascript packages.

## Info

The project is built with PHP >= 7.2.0 and Laravel 6.2

The back-end functionalities have been built by using Test Driven Development with [PHPUnit](https://phpunit.de/documentation.html)
You can find the tests in the `tests` folder. The tests are divided into unit and feature tests.
To execute the tests run the following command from the project folder:
`vendor/bin/phpunit`