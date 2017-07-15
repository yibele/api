<?php
use Phalcon\Mvc\View\Engine\Volt;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

require BASE_PATH . '/app/config/loader.php';
require BASE_PATH . '/app/config/service.php';
require BASE_PATH . '/app/config/router.php';




