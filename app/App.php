<?php

declare(strict_types = 1);

$content = [];
// Your Code

function storeCSVFile(string $csvFilePath)
{
    global $content; // cause function is local scope like domain expansion in jujustu kaisen

    $handle = fopen($csvFilePath, 'r');

    if ($handle !== false)
    {
        while(($line = fgetcsv($handle)) !== false) 
        {
            array_push($content, $line);
            
        }
        
    }
    else
    {
        echo 'File not found';
        return false;
    }

}
