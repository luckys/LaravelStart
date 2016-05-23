<?php

return [

	'name' => 'Auth',

    /*
    |--------------------------------------------------------------------------
    | Configuración de Permisos
    |--------------------------------------------------------------------------
    |
    | Archivo para configurar los permisos por defecto del sistema.
    | Los permisos aqui definidos se insertan en la bd al hacer el seeder.
    | Estos se refieren a las tablas del sistema con sus respectivos permisos.
    |
    */

    'tables' => [
        'permissions' => ['create', 'read', 'update', 'delete'],
        'roles'       => ['create', 'read', 'update', 'delete'],
        'users'       => ['create', 'read', 'update', 'delete']
        
    ]
];