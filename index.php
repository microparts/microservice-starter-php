<?php declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap.php';

// Run the server, it should listen on localhost:8080
$app->run($server);
