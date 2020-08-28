### Movie Website

Source code of a movie website

### Requirement

- php 7.4
- nodejs 12
- php-gd (2.x)

### Installation
- Prepare database and set config into .env

- Initialize project
```
$ php artisan install:dev (or install:prod)
```
```
$ npm run dev (or prod)
```
- 404 fix (may caused by aetherupload): 
```
$ php artisan aetherupload:publish
```
