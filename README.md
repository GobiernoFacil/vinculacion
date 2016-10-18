# Guía de instalación de Empleo abierto

## Dependencias:
* Apache
* PHP >= 5.6
- php56-mbstring
- php56-gd
- php56-mcrypt
- php56-soap
- php56-tidy
- php56-dbg
- php56-cli
* Mysql
* Composer
* Bower


## Pasos para instalar el sistema
1: copiar los archivos del siguiente repositorio:
[https://github.com/GobiernoFacil/vinculacion] (https://github.com/hugovom/sectur.git)

2: en la carpeta raíz, hay que correr el siguiente comando:
```bash
composer install
```

3: en la carpeta raíz, hay que copiar el archivo .env.example a .env
```bash
cp .env.example .env
```

4: crear la base de datos que se va a ocupar

5: editar el archivo .env, en el que se debe poner la información de conexión a la DB. También debe agregarse información del api de Correos. En el servidor de Gobierno fácil usamos Mailgun, pero hay otros disponibles.
```bash
MAIL_DRIVER=mailgun
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=postmaster@xxxxxxxxxx.mailgun.org
MAIL_PASSWORD=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
MAIL_ENCRYPTION=null
MAILGUN_DOMAIN=sandboxxxxxxxxxxxxxxxxxxxxxxxx.mailgun.org
MAILGUN_SECRET=key-xxxxxxxxxxxxxxxxxxxxxxxxx
```

6: dentro de este mismo archivo de .env se debe definir el usuario para el primer admin del sistema, y para el usuario perteneciente a la SECOTRADE de la siguiente manera:
```bash
ADMIN_EMAIL=howdy@gobiernofacil.com
ADMIN_NAME="arturo c."
ADMIN_PASSWORD=secret_pass_1

ADMIN_PUEBLA_NAME="secotrade"
ADMIN_PUEBLA_EMAIL=secotrade@puebla.gob.mx
ADMIN_PUEBLA_PASSWORD=secret_pass_2
```

El archivo .env debe verse más o menos así:
```bash
APP_ENV=local
APP_DEBUG=true
APP_KEY=some_key
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gape
DB_USERNAME=db_user
DB_PASSWORD=secret_pass_0

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=mailgun
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=postmaster@xxxxxxxxxx.mailgun.org
MAIL_PASSWORD=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
MAIL_ENCRYPTION=null
MAILGUN_DOMAIN=sandboxxxxxxxxxxxxxxxxxxxxxxxx.mailgun.org
MAILGUN_SECRET=key-xxxxxxxxxxxxxxxxxxxxxxxxx

ADMIN_EMAIL=howdy@gobiernofacil.com
ADMIN_NAME="arturo c."
ADMIN_PASSWORD=secret_pass_1

ADMIN_PUEBLA_NAME="secotrade"
ADMIN_PUEBLA_EMAIL=secotrade@puebla.gob.mx
ADMIN_PUEBLA_PASSWORD=secret_pass_2
```

7: Despues de guardar y cerrar el archivo .env, hay que generar la llave de encriptación con:
```bash
php artisan key:generate
```

8: Acto siguiente, hay que crear las tablas en la base de datos, con el siguiente comando:
```bash
php artisan migrate
```

9: Ya con las tablas disponibles, hay que copiar la información inicial: universidades, usuarios, códigos postales, etc., mediante el siguiente comando:
```bash
php artisan db:seed
```
(Esto puede tardar unos minutos, dependiendo de la velocidad del equipo)

10: dentro de la carpeta  "public/js"  es necesario  ejecutar  el siguiente comando,  para  obtener las dependencias de Javascript
```bash
bower update
```

y eso es todo amigos!

## Guía para actualizar el sistema
1: obtener los cambios del código con git
```bash
git pull origin master
```

2: es posible que haya cambios en la DB y nuevas librerías de PHP. Esto no es común, pero mejor revisar:
```bash
composer install
php artisan migrate
```

3: dentro de la carpeta  "public/js"  es necesario  ejecutar  el siguiente comando,  para  obtener nuevas dependencias de Javascript
```bash
bower update
```

(cuando esto se ejecuta en un servidor de producción, Artisan pide confirmación para realizar el _migrate_. Esto no debería afectar los registros de la DB).
