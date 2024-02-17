<?php

//Сортування вибором

$unsorted = [23, 3, 5, 34, 2, 11, 35, 796, 0, 44];


function Selection_Sort(array $array): array
{
    for ($i=0; $i<count($array); $i++)
    {
        $position=$i;
        $min=$array[$i];
        for ($j=$i+1; $j<count($array); $j++){
            if ($array[$j]<$min)
            {
                $position=$j;
                $min=$array[$position];
            }
        }
        $array[$position]=$array[$i];
        $array[$i]=$min;
    }

    return $array;
}

echo implode(', ', Selection_Sort($unsorted)) . PHP_EOL;
