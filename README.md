# PHP, Laravel Basic Level Challenge

## What we expect from your code
* Clean code
* Readability
* Extensibility
* Maintainability
* Testability
* Documentation & Comment

## Technical Description

### ERD

**Group**

| id | name | description | create_at | updated_at |
| - | - | - | - | - |
| auto | string (16) | string(255) | datetime | datetime |

**Resource**

| id | group_id | name | description | create_at | updated_at |
| - | - | - | - | - | - |
| auto| FK | string (16) | string(255) | datetime | datetime |

### Details

* Create new migrations
* Create new models
* Create CRUD methods in each model's controller
* Setup Resource APIs

### Validation

Define validation rules for fillable attributes, and use it through Request.

* `name` : required | unique, and necessary normal rules
* `description` : nullable, and necessary normal rules
* `group_id` : exists, and necessary normal rules

### Model Factory

Create model factories that use `faker` for each model.

### Unit Test

* Create Unit Test file for each model, and define all necessary test cases to test model's CRUD, attribute, validation and resource APIs.
* Use `phpunit`.
* Unit Test must be done successfully.

## Requirement

* PHP 7.2
* Laravel 5.2
* MySQL 5.7
* Laravel Homestead (Vagrant)

## Estimate

8 hours

## Delivery

* Step by step installation guide including unit test steps in Readme.
* Source code including homestead related files.
* Share your git repo url to us.

## Instruction
* Run command to create database `php artisan make:database laravel {connection?}`
* Run command to create tables `php artisan migrate`
* Run command to seed `php artisan db:seed --class=GroupSeeder, php artisan db:seed --class=ResourceSeeder`

Thanks.
