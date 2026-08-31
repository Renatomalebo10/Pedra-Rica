<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Vercel runs in a read-only /var/task. Redirect writable paths to /tmp.
$base = __DIR__.'/../';

// Point bootstrap/cache and framework cache/sessions/views to /tmp.
$frameworkCache = '/tmp/pedrarica/framework';
$bootstrapCache = '/tmp/pedrarica/bootstrap-cache';

foreach ([$frameworkCache.'/cache', $frameworkCache.'/sessions', $frameworkCache.'/views', $bootstrapCache] as $dir) {
    if (! is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// Register the Composer autoloader...
require $base.'vendor/autoload.php';

/** @var Application $app */
$app = require_once $base.'bootstrap/app.php';

// Override writable paths so Laravel doesn't try to write to the read-only filesystem.
$app->useBootstrapPath($bootstrapCache);
$app->useStoragePath('/tmp/pedrarica/storage');

$app->handleRequest(Request::capture());
