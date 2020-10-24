## Instalación de proyecto 'productos-api'

#### Git clone
<code>git clone https://github.com/stephen-tif/Prueba-Backend-Developer.git</code>

#### Instalando dependendencias con Composer
<em>#cd in your project directory</em>
<br>
composer install
<br>
composer dumpautoload -o

#### Comprobando los valores en config/app.php

<em>#Environment</em>
<br>
'env' => env('APP_ENV', 'production'),
<br>
<em>#Debug mode</em>
<br>
'debug' => env('APP_DEBUG', false),
<br>
<em>#URL</em>
<br>
'url' => env('APP_URL', 'http://localhost'),

#### Defina su archivo de entorno, en la raíz del directorio de su proyecto.
<em>#Copy the environment template</em>
<br>
cp .env.example .env

#### Genere la clave para su archivo de entorno, definirá el valor de 'APP_KEY ='
<code>php artisan key:generate</code>

### ->Edite luego el archivo .env para que se adapte a sus necesidades 

#### Termine borrando la configuración y generando el caché.
<code>php artisan config:clear</code>
<br>
<code>php artisan config:cache</code>


## Instalación de base de datos y uso de los data dummy

#### DATABASE
En la carpeta 'database' se encuentran el dump de la base de datos con el nombre 'productos.sql' el cual ya contiene data dummy para el testing de la API que sea necesario. Este archivo pude ser importado en el phpmyadmin que nos brinda apache.

#### MIGRATION
<em>(Primero se debe instalar el proyecto)</em>
<br>
En la carpeta 'database/migrations' se encuentran las migraciones correspondientes en caso que se desee generar una base de datos desde cero.
<br><br>
<strong>Ejecutar las migraciones:</strong> <code>php artisan migrate</code>

#### SEEDS
<em>(Antes se debe tener una base de datos para ejecutar los seeds)</em>
<br>
En la carpeta 'database/seeds' se encuentran las seeds correspondientes en caso que se necesite data dummy en una base de datos vacia.
<br><br>
<strong>Ejecutar los seeds:</strong> <code>php artisan db:seed</code>



## Colección postman

#### ARCHIVO  DE COLECCIÓN POSTMAN
En la carpeta 'routes' se encuentra un archivo de tipo JSON con el nombre 'Prueba Backend Developer - Stephen Melendez.postman_collection.json' el cueal se puede importar en postman para ocupar las diferentes peticiones y respuestas HTTP.

#### LINK EN LINEA DE LA COLECCIÓN
<a>https://www.getpostman.com/collections/8994ae1c6f593f4bc3bc</a>
