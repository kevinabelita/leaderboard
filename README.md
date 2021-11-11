# Sample Leaderboard REST API

This is an example of a REST API with CRUD Operations

## Getting Started

### Dependencies

* You must need to have PHP, MySQL, and Apache installed. You can use something like all-in-one box solution Laragon in windows or similar with MAC (xampp-vm)
* Composer installed

### How to run

* Simply get this repo and right after install the dependencies via Composer
```
composer install
```
* Next step would be to have the migration setup via artisan
```
php artisan migrate:fresh --seed
```
