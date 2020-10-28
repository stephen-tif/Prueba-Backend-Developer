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


# DOCUMENTACIÓN DE USO DE API
Para poder acceder a los request de los crud se necesita tener un JWT(Json Web Token).

## LOGIN
<strong>METODO POST:</strong>
<br>
<p>Al loguearnos obtenemos el token de acceso a otras rutas del API (este token tiene una duracion de 7 dias vigentes)</p>
<code>http://localhost/productos-api/public/api/auth/login</code>
<br><br>
<strong>Parametros:</strong>
<br>
<ul>
    <li>email</li>
    <li>password</li>
</ul>

## LOGOUT
<strong>METODO POST:</strong>
<br>
<p>Al cerrar sesion desaparecemos el token de acceso para mayor seguridad</p>
<code>http://localhost/productos-api/public/api/auth/logout</code>
<br><br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## REFRESH
<strong>METODO POST:</strong>
<br>
<p>Al hacer refresh lo que se esta haciendo es reestablecer nuestro token de acceso por uno nuevo</p>
<code>http://localhost/productos-api/public/api/auth/refresh</code>
<br><br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## ME
<strong>METODO POST:</strong>
<br>
<p>Si en algun momento del desarrollo queremos obtener los datos del usuario atraves del token asignado, podremos obtenerlo sin ningun problema</p>
<code>http://localhost/productos-api/public/api/auth/me</code>
<br><br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## FORGOT PASSWORD
<strong>METODO POST:</strong>
<br>
<p>Para restablecer una contraseña se debe brindar un email valido al cual sera enviado el URL de recuperacion.</p>
<code>http://localhost/productos-api/public/api/forgotPassword</code>
<br><br>
<strong>Parametros:</strong>
<br>
<ul>
    <li>email</li>
</ul>

## RESET PASSWORD
<strong>METODO POST:</strong>
<br>
<code>http://localhost/productos-api/public/api/passwordReset</code>
<br><br>
<strong>Parametros:</strong>
<br>
<ul>
    <li>token <i>// Este token es asignado en 'forgot password'</i></li>
    <li>email</li>
    <li>password <i>// Nueva contraseña</i></li>
</ul>


## LISTAR USUARIOS
<strong>METODO GET:</strong>
<br>
<code>http://localhost/productos-api/public/api/usuarios</code>
<br><br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## OBTENER UN USUARIO
<strong>METODO GET:</strong>
<br>
<code>http://localhost/productos-api/public/api/usuarios/{id}</code>
<br><br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## CREAR USUARIO
<strong>METODO POST:</strong>
<br>
<code>http://localhost/productos-api/public/api/usuarios</code>
<br><br>
<strong>Parametros:</strong>
<br>
<ul>
    <li>nombre</li>
    <li>telefono</li>
    <li>username</li>
    <li>f_nacimiento</li>
    <li>email</li>
    <li>password</li>
</ul>
<br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## MODIFICAR USUARIO
<strong>METODO PUT:</strong>
<br>
<code>http://localhost/productos-api/public/api/usuarios/{id}</code>
<br><br>
<strong>Parametros:</strong>
<br>
<ul>
    <li>nombre</li>
    <li>telefono</li>
    <li>username</li>
    <li>f_nacimiento</li>
    <li>email</li>
    <li>password</li>
</ul>
<br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## ELIMINAR USUARIO
<strong>METODO DELETE:</strong>
<br>
<code>http://localhost/productos-api/public/api/usuarios/{id}</code>
<br><br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>


## LISTAR PRODUCTOS
<strong>METODO GET:</strong>
<br>
<code>http://localhost/productos-api/public/api/productos</code>
<br><br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## OBTENER UN PRODUCTO
<strong>METODO GET:</strong>
<br>
<code>http://localhost/productos-api/public/api/productos/{id}</code>
<br><br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## BUSCAR PRODUCTOS
<strong>METODO GET:</strong>
<p>Se puede hacer busqueda de producto enviando como parametro sku o nombre</p>
<br>
<code>http://localhost/productos-api/public/api/productos/search/{param}</code>
<br><br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## CREAR UN PRODUCTO
<strong>METODO POST:</strong>
<br>
<code>http://localhost/productos-api/public/api/productos</code>
<br><br>
<strong>Parametros:</strong>
<br>
<ul>
    <li>sku</li>
    <li>nombre</li>
    <li>cantidad</li>
    <li>precio</li>
    <li>descripcion</li>
    <li>imagen <i>//file</i></li>
</ul>
<br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## MODIFICAR PRODUCTO
<strong>METODO POST:</strong>
<br>
<code>http://localhost/productos-api/public/api/productos/update/{id}</code>
<br><br>
<strong>Parametros:</strong>
<br>
<ul>
    <li>sku</li>
    <li>nombre</li>
    <li>cantidad</li>
    <li>precio</li>
    <li>descripcion</li>
    <li>imagen <i>//file</i></li>
</ul>
<br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>

## ELIMINAR PRODUCTO
<strong>METODO DELETE:</strong>
<br>
<code>http://localhost/productos-api/public/api/productos/{id}</code>
<br><br>
<strong>Authorization:</strong>
<br>
<ul>
    <li>Bearer <i>YOUR_TOKEN</i></li>
</ul>
