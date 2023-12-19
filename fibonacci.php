<?php

function fibonacci(int $number)
{
	$array = [];
	$array[0]=0;
	$array[1]=1;
	for ($i=2; $i<$number; $i++)
	{
		$array[$i] = $array[$i-1] + $array[$i-2];
	}
	
	return $array;
}


function sum($number)
{
	$array=fibonacci($number);
	$result=0;
	
		for ($i=0; $i<$number; $i++)
	{
		$result+=$array[$i];
	}
	
	echo "The sum of the $number Fibonacci number sequence equals: ";
	echo $result;
	echo PHP_EOL;
	echo PHP_EOL;
}
	


sum(10);
sum(15);
sum(155);