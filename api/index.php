<?php

$storagePath = '/tmp/storage';
$cachePath = '/tmp/bootstrap/cache';

if (!is_dir($storagePath)) {
    mkdir($storagePath, 0755, true);
}

if (!is_dir($cachePath)) {
    mkdir($cachePath, 0755, true);
}

putenv("LARAVEL_STORAGE_PATH=$storagePath");

require __DIR__ . '/../public/index.php';