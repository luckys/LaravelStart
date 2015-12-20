## LaravelStart 1.0

LaravelStart es una aplicación base de donde partir para comenzar un proyecto nuevo con Laravel 5.1, esta dividida en módulos y contiene el módulo de autenticación y dashboard, con lo cual ya se tendria implementado el acceso por parte de usuarios, estos tiene roles y a su vez los roles tienen diferentes permisos, actualmente contiene un único rol que es el de administrador.

Librerias integradas:
- `Pinpong Modules` para separar la aplicación por módulos: (https://sky.pingpong-labs.com/docs/2.1/modules).
- `Entrust` para el módulo de autenticación: (https://github.com/Zizaco/entrust).
- `Laravel-Dompdf` para los reportes en pdf: (https://github.com/barryvdh/laravel-dompdf).
- `Framework Bootstrap` para el frontend de la aplicación.

Instalación: 
Descargar o clonar el proyecto, crear el archivo `".env"` y poner información necesaria sobre la base de datos, por último teclear el comando `"php artisan app:install"` dentro de la carpeta del proyecto para realizar las migraciones de la base de datos.

```
Acceso al Sistema:
Role Admin:
email: admin@demo.com
password: admin123
```
