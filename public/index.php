<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* YOUR CODE (Instructions in README.md) */

require APP_PATH . 'App.php';

// get all files from a directory 
$allFiles = getFilesFromDirectory(FILES_PATH);

// read all data 
$transactions_files = [];

foreach($allFiles as $file)
{
    $transactions_files = getDataFromFile($file);
}

