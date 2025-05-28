<?php

use function NixPHP\route;

route()->add('GET', '/', ['App\Controllers\AppController', 'index'], 'index');
route()->add('POST', '/', ['App\Controllers\AppController', 'index'], 'processing');
