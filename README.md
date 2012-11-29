COSTURITA Y COSTUSHOP
=====================

Sistema para manejo de sastrerias Costurita y Costushop.

Ayuda
-----

Bajar e instalar en htdocs de su Servidor Web.

Base de datos.

El archivo:
    
    sastreria.sql

contiene la tabla inicial necesaria para arrancar operaciones se debe restaurar o ejecutar como script.

Buscar esta Ruta y Modificar los parametros de acuerdo a su configuracion actual.
    
    costurita/application/config/database.php

Lo que hay dentro:

    $active_group = 'default';
    $active_record = TRUE;
    
    $db['default']['hostname'] = '127.0.0.1'; //localhost
    $db['default']['username'] = 'root'; //usuario de la base de datos
    $db['default']['password'] = 'garigol'; //password de la base de datos
    $db['default']['database'] = 'sastreria'; //nombre de la base de datos
    $db['default']['dbdriver'] = 'mysql'; //driver mysql
    $db['default']['dbprefix'] = '';
    $db['default']['pconnect'] = FALSE;
    $db['default']['db_debug'] = TRUE;
    $db['default']['cache_on'] = FALSE;
    $db['default']['cachedir'] = '';
    $db['default']['char_set'] = 'utf8';
    $db['default']['dbcollat'] = 'utf8_general_ci';
    $db['default']['swap_pre'] = '';
    $db['default']['autoinit'] = TRUE;
    $db['default']['stricton'] = FALSE;
    
Configuracion.

Buscar esta Ruta y Modificar los parametros de acuerdo a su configuracion actual.
    
    costurita/application/config/constants.php

Lo que hay dentro:
    
    define('TITULO_WEB', 'COSTURITA - Arreglos para Verte Bien'); //Modificar el titulo
    define('MENSAJE_BIENVENIDA', 'Buen  Dia!');
    define('LOGO_TICKET', 'logo_blanco.png');
    
Logos.

Los logos que se encuentran en:
    
     costurita/logos/costurita 
     costurita/logos/costushop

Moverlos a:

     costurita/img
     
El usuario inicial sera:

    usuario: admin
    password: admin

Desarrollado
------------

Codeigniter
JQuery
Mysql