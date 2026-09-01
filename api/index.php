<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('log_errors', 1);

register_shutdown_function(function () {
    $err = error_get_last();
    if ($err && in_array($err['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        http_response_code(500);
        header('Content-Type: text/plain');
        echo "FATAL: {$err['message']} at {$err['file']}:{$err['line']}\n";
    }
});

set_exception_handler(function ($e) {
    http_response_code(500);
    header('Content-Type: text/plain');
    echo "EXCEPTION: " . $e->getMessage() . " at " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo $e->getTraceAsString() . "\n";
});

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->handleRequest(
    \Illuminate\Http\Request::capture()
);