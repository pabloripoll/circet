<?php

$debug = true;
if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

require_once dirname(__DIR__, 1).'/vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->middlewareBefore();

$app->run();

$app->middlewareAfter();

exit;
