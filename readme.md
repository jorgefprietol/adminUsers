# Test Practico:
Laverix Cia Ltda le invita a realizar el siguiente test práctico como parte del proceso de calificación y selección de aspirantes al puesto de Desarrollador Senior.
Crear una aplicación web con Laravel con las siguientes funcionalidades requeridas:
•	1. Inicio de session
o	Registrar fecha y hora de último inicio de session (Logs)
•	2. Cerrar session
•	3. Registro de nuevos usuarios
•	4. Activación de cuenta por correo electrónico
•	5. Recuperación de contraseña
•	6. Formulario de actualización de información de usuario
o	Nombres
o	Apellidos
o	Dirección
o	Fecha de nacimiento
•	7. Incluir un usuario por defecto (usuario:admin@jfpl.com clave:secret, usuario:usuario@jfpl.com clave:secret, usuario:inactivo@jfpl.com clave:secret)

La aplicación se debe subir a un repositorio GIT en internet(bitbucket o github) con todas las consideraciones que sean necesarias en el archivo readme.
El tiempo para completar y enviar el test es de un día.
Enviar al correo electrónico rmiranda@laverix.com.ec la dirección del repositorio.

# adminUsers - Jorge Prieto Resultado:

## Requerimientos
* PHP >= 7.2.0
* Laravel >= 6.x
* Composer
* Git
* MySQL

## Instalación

* `git clone https://github.com/jorgefprietol/adminUsers.git adminUsers`
* `cd adminUsers`
* `composer install`
* `cp .env.example .env`
* `php artisan key:generate`
*  Agrega los datos de conexión a la base de datos en *.env*
* `php artisan migrate`
* `php artisan db:seed`
* `php artisan storage:link`
* Opcional: `php artisan serve` crear servior en http://localhost:8000/