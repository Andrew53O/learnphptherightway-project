<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

/* YOUR CODE (Instructions in README.md) */

// include necessary file 
require APP_PATH . "App.php";


if (!file_exists(FILES_PATH . "sample_1.csv"))
{
    echo "File not Found";
    return;
}
else
{   
    $file_path = FILES_PATH . "sample_1.csv";
}


// read csv file
storeCSVFile($file_path); // all ada stored in $content array of array

// calculate the income, expense and net total
calculateMoney();

// Format the money
$total_income = formattingMoney(strval($total_income));
$total_expense = formattingMoney(strval($total_expense));
$net_total = formattingMoney(strval($net_total));

// PROCESS THE TRANSACTION FILE
require VIEWS_PATH . "transactions.php";
