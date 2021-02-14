<?php

declare(strict_types=1);
require __DIR__ . '\vendor\autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



$home = 'http://127.0.0.1/php_projects';