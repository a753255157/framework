<?php
use core\main;

defined('ROOT') or define('ROOT', dirname(__DIR__).'/');
defined('APPROOT') or define('APPROOT', __DIR__.'/');

defined('APP') or define('APP', 'app1');

ini_set("display_errors", "On");

include ROOT.'vendor/autoload.php';
require_once ROOT.'core/main.php';

spl_autoload_register('core\main::load');

$config = include APPROOT.'config/main.php';

$app = new main($config);
$app::run();