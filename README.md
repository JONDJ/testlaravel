<p align="center">Proyecto creado por Jonathan Ortega usando Laravel. Se utiliza un crudo para administrar usuarios, un formulario de envío de emails y un api de consulta</p>

PRUEBA TÉCNICA LARAVEL - FullStack DEVELOPER
Requerimiento general:
Como administrador se debe poder acceder a CRUD de usuarios: crear, consultar, actualizar y eliminar usuarios.
- Con Seed de Laravel debe insertarse el usuario administrador.
Tecnologías requeridas:
- Laravel
- No se permite el uso de Laravel Jetstream, Livewire o Inertia.js
1. Requerimientos CRUD
Requerimientos Criterios de aceptación
Creación de usuario Para el registro de usuarios se necesitan los siguientes campos con sus respectivas validaciones y mensajes de error:
- Id
- Email (campo obligatorio, debe ser único, tipo email)
- Contraseña (mínimo 8 caracteres, obliga: un número, una letra mayúscula, un carácter especial, con campo de
confirmación de contraseña)
- Las contraseñas de los usuarios deben guardarse encriptadas
- Nombre (obligatorio, longitud 100)
- Número Celular ( opcional, 10 dígitos)
- Cédula (obligatorio, la longitud máxima 11, campo varchar),
- Fecha de nacimiento (obligatorio, la persona no puede ser menor de 18 años)
- Incluir select anidado (o autocompletar) con país, estado y ciudad por ajax, donde el valor a relacionar con la persona es
el ciudad.
Nota:
- No olvidar comentar el código.
- Realizar migrations, seeds.
- Todas las relaciones deben verse reflejadas en los modelos de laravel.
Grilla de consulta - Filtro general que busque en los campos (Nombre, Cédula, email, Celular)
- Ordenamiento por columnas
- Paginación del lado del servidor (debe ser configurable por cantidad de registros por página)
- Debe mostrar todos los campos excepto el password. La edad aunque no se guarde en base de datos se debe mostrar.
Actualización - Desde la grilla de consulta se debe poder editar los datos de los usuarios.
- No debe permitir cambiar la cédula ni el email
Opcional: Implementar un sistema de logs para revisar los cambios históricos
Eliminación Desde la grilla de consulta se debe poder eliminar los datos de los usuarios.2. Requerimiento de emails
Requerimientos
específicos
Criterios de aceptación
Autenticación Apoyado por la autenticación que ofrece Laravel, permitir que las personas insertadas en el punto 1 puedan ingresar por medio
del email y una contraseña.
Una vez logueado, el usuario puede ver sus datos y la opción de cerrar sesión.
Registro de emails Solo los usuarios autenticados deben poder acceder a un formulario, donde puedan realizar la inserción de los datos comunes
de email (asunto, destinatario y mensaje ) para un envío posterior (cola de emails).
Dicho registro debe ir relacionado con el usuario que envía el email.
Envío de emails Los emails registrados en el punto anterior deben poderse enviar en secuencia, por medio de una función registrando cuales
fueron enviados y cuáles no.
Ideal: ejecución de envío de email por medio de comando en artisan.
Consulta de emails - Los usuarios registrados podrán ver sus email con su estado
3. Requerimiento API (Consulta emails)
Requerimientos
específicos
Criterios de aceptación
Consulta emails Se requiere un endpoint público para consultar los email
- Filtro general que busque en los campos (Remitente, Destinatario, Asunto)
- Ordenamiento por fecha de creación
- Paginación del lado del servidor (debe ser configurable por cantidad de registros por página)
- Debe mostrar todos los campos excepto el password. La edad aunque no se guarde en base de datos se debe mostrar.
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
