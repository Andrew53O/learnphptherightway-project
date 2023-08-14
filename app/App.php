<?php

declare(strict_types = 1);

$content = [];
$total_income = 0;
$total_expense = 0;
$net_total = 0;
// Your Code

function storeCSVFile(string $csvFilePath)
{
    global $content; // cause function is local scope like domain expansion in jujustu kaisen

    $handle = fopen($csvFilePath, 'r');

    if ($handle !== false)
    {
        // get the first row, to get the title
        if (($line = fgetcsv($handle)) !== false)
        {
            $title = $line;

            while(($line = fgetcsv($handle)) !== false) 
            {
               // array combine to use $title as key
                $result = array_combine($title, $line);
    
                array_push($content, $result);
                
            }
        }
        
    }
    else
    {
        echo 'File not found';
        return false;
    }

}

// Find the income, expense
function calculateMoney() {

    global $content, $net_total;

    foreach($content as $one_transaction)
    {
        global $total_income, $total_expense;
        
        $money = $one_transaction['Amount']; // $xxx.xx / -$x,xxx.xx

        // delete '$' and "," char "," since php stop traces number at ","
        $money = str_replace(['$', ","], '', $money);

        if($money >= 0)
        {
            $total_income += (float) $money; 
        }
        else
        {
            $total_expense += (float) $money;
        }
    
    }

    $net_total = $total_income + $total_expense;

}

function formattingMoney(string $money_arguments): string
{  
    if ($money_arguments >= 0)
    {
        return ("$" . $money_arguments);
    }
    else
    {
        return (str_replace('-', "-$", $money_arguments));
    }
}
