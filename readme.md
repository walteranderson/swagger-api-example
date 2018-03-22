# Swagger API Example

This is an example of a REST API with an accompanying [swagger](swagger.io) specification.


## Installation

Be sure to update the `.env` file with the proper DB credentials.

```
$ composer install
$ php artisan migrate
$ php artisan db:seed
$ php -S localhost:8000 -t public
```
