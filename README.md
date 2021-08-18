# Laravel-Clase3Ej3
<p>Ejemplo 3 del Tutorial de Laravel Framework <b>Clase 3</b> </p> 
<ul>
  <li> CRUD ejemplo de Stock</li>
</ul>
<br>
<p> <b> Como instalar y utilizar este ejemplo </b></p>
<ol>
    <li>Instalar paquetes o dependencias, desde la terminal de VS Code o del OS estando en la carpeta del proyecto tipear </li>
    <ul type="square">
        <li>composer install</li>
        <li>composer update</li>
        <li>composer fund</li>
    </ul>
    <li>Realizar una copia del archivo .env.example</li>
    <ul type="square">
        <li>cp .env.example .env</li>
    </ul>
        <li>Generar APP_KEY que es una cadena de caracteres generada aleatoriamente por Laravel que utiliza para todas las cookies cifradas, como las cookies de sesión. Para generar la APP_KEY del proyecto ejecutar el siguiente comando </li>
    <ul type="square">
        <li>php artisan key:generate</li>
    </ul>
    <li> Instalar el paquete de traducción en español</li>
    <ul type="square">
        <li>composer require laraveles/spanish</li>
    </ul>
    <li> Instalar las rutas con autenticacion </li>
    <ul>
        <li>composer require laravel/ui</li>
    </ul type="square">
    <li>Deberá crear una BD llamada stockpyme en su motor de BD y ejecutar el servicio</li>
    <li> Para crear la tabla de migraciones en la BD se deberá ejecutar desde la Terminal de VS Code o del OS estando en la carpeta del proyecto</li>
    <ul type="square">
        <li>php artisan migrate:install</li>
    </ul>
    <li> Para lanzar las migraciones de este ejemplo e impacten en la BD se deberá ejecutar desde la Terminal de VS Code o del OS estando en la carpeta del proyecto</li>
    <ul type="square">
        <li>php artisan migrate</li>
    </ul>
    <li> Agregar elementos de prueba (Seed) en la tabla Categorias</li>
    <ul type="square">
        <li>php artisan db:seed</li>
    </ul>
</ol>
