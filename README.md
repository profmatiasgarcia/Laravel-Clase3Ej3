# Laravel-Clase3Ej3
## Ejemplo 3 del Tutorial de Laravel Framework Clase 3

  * CRUD ejemplo de Stock

## Como instalar y utilizar este ejemplo

1. Instalar paquetes o dependencias, desde la terminal de VS Code o del OS estando en la carpeta del proyecto tipear
```bash
commposer install
``` 
```bash
composer update
```
```bash
composer fund
 ```

2. Realizar una copia del archivo .env.example
```bash
cp .env.example .env
```

3. Generar APP_KEY que es una cadena de caracteres generada aleatoriamente por Laravel que utiliza para todas las cookies cifradas, como las cookies de sesión. Para generar la APP_KEY del proyecto ejecutar el siguiente comando
```bash
php artisan key:generate
```
4. Instalar el paquete de traducción en español
```bash
composer require laraveles/spanish
```

5. Instalar las rutas con autenticacion
```bash
composer require laravel/ui
```

6. Deberá crear en su motor de base de datos la BD llamada **stockpyme** y ejecutar el servicio.

7. Para crear la tabla de migraciones en la BD se deberá ejecutar desde la Terminal de VS Code o del OS estando en la carpeta del proyecto
```bash
php artisan migrate:install
```

8. Para lanzar las migraciones de este ejemplo e impacten en la BD se deberá ejecutar desde la Terminal de VS Code o del OS estando en la carpeta del proyecto
```bash
php artisan migrate
```
9. Agregar elementos de prueba (Seed) en la tabla Categorias
```bash
php artisan db:seed
```

## Apunte Tutorial de Laravel Framework Clase 3
[Laravel-Clase3](https://www.profmatiasgarcia.com.ar/uploads/tutoriales/Laravel-Clase3.pdf)

## Licencia
[GPLv3](https://www.gnu.org/licenses/gpl-3.0.en.html)
