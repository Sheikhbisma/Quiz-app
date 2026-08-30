<?php

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);

    echo '<pre>';
    echo "ERROR: " . $e->getMessage() . "\n\n";
    echo "FILE: " . $e->getFile() . "\n";
    echo "LINE: " . $e->getLine() . "\n\n";
    echo $e->getTraceAsString();
    echo '</pre>';
}