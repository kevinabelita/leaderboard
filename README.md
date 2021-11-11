# Sample Leaderboard REST API

This is an example of a REST API with CRUD Operations. Made from Lumen Microframework.

## Getting Started

### Prerequisites

* You need to have PHP, MySQL, and Apache installed. You can use an all-in-one box solution like Laragon for windows or XAMPP-VM in Mac, or running it vanilla in Linux.
* Must have Composer installed

### How to run

* Simply clone this repo and right after install, fetch the dependencies via Composer
```
composer install
```
* Next step would be to create a database called `leaderboard` and setup your `.env` file to define the credentials (database, username, and password) to connect to MySQL. 

* Have the migration setup via artisan
```
php artisan migrate:fresh --seed
```
* If everything is in order, you can start running a local instance:
```
php artisan serve
```

## API Routes


#### Add a participant in the Leaderboard
```
POST http://localhost:8000/api/participant/add
```
PARAMS
```
name => required
age => required
address => required
```

#### Display all participants in the Leaderboard
```
GET http://localhost:8000/api/participants
```

#### Show a particular participant in full detail
```
GET http://localhost:8000/api/participant/:participant_id
```

#### Increment or Decrement Participant's points
```
PATCH http://localhost:8000/api/participant/:participant_id/:action[increment|decrement]
```

#### Remove a participant
```
DELETE http://localhost:8000/api/participant/remove/:participant_id
```
