# yasmf
Yet Another Simple MVC Framework (for PHP)


## Context

This project has been designed in the context of computer science course in a French curriculum called "BUT Informatique".

The course is about Web Server development with PHP. 

## Disclaimer

The project has only been tested in small to medium academic projects.  

In addition, the designer (I), is not a PHP guy but a more Java/Kotlin guy who is used to work with frameworks like Spring Boot. It may introduce some bias into the design.

## To launch PHPStan

`php ./vendor/bin/phpstan --xdebug analyse -c ./phpstan.neon`

### To launch tests (without coverage)

`php ./vendor/bin/phpunit`

### To launch tests with coverage

`php -dxdebug.mode=coverage ./vendor/bin/phpunit  --coverage-html='reports/coverage'`