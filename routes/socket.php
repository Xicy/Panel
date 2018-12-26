<?php

/*
|--------------------------------------------------------------------------
| WebSocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register WebSocket routes for your application.
| Based for "Symfony Routing Component".
|
| Example: $socket->route('/myclass', new MyClass, ['*']);
|
*/

$socket->route('/', new \App\Http\Sockets\MyClass(), ['*']);
