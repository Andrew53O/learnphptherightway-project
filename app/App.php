<?php

declare(strict_types = 1);

// solving the business logic


// Get all files from a directory 
function getFilesFromDirectory(string $path): array
{
    $files = [];

    $filter_files = scandir($path);

    foreach($filter_files as $file)
    {
        // remove the '.' and '..' from the scandir
        if (is_dir($file))
        {
            continue;
        }
    
        $files[] = $path . $file;
    }

    return $files;
}

// read inside a file
function getDataFromFile(string $path) : array
{
    $data = [];

    $handle = fopen($path, 'r');

    if ($handle === false)
    {
        trigger_error("Cannot Open File", E_USER_ERROR);
    }
    else
    {
        while(($line = fgetcsv($handle)) !== false)
        {
            $data[] = $line;
        }
    }

    return $data;
}

