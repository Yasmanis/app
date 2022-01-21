<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requerimientos

- Php 8.x
- Nodejs 14.17.5
- Mysql 8

## Instalación
```php
composer install
npm i
npm run dev
php artisan migrate --seed
php artisan serve
```

## Obtener Lista de Ciudades
```php
http://localhost:8000/api/get-city?token=51774552545955402348552a48445944474446
```

## Crear Ciudad con Provincia
```php
php artisan create:city Parana, EntreRios
```

## ABM Provincia
```php
http://localhost:8000/provincias
```

## Tabla de ciudades
```php
http://localhost:8000/ciudades
```
