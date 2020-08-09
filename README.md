### Movie Website

Source code of a movie website

## Administration

### Installation

- Initialize default admin (admin:admin)
```
$ php artisan admin:install
```
- Optional plugins
  - helpers
  ```
  $ php artisan admin:import helpers
  ``` 
  - media manager
  ```
  $ php artisan admin:import media-manager
  ```
  
- 404 fix (may caused by aetherupload): 
```
$ php artisan aetherupload:publish
```
