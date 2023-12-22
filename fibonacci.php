<?php

function fibonacci_Sum(int $number)
{
	if ($number==0)     echo "The sum of the $number Fibonacci number sequence equals: 0" . PHP_EOL . PHP_EOL;
	else if ($number<0) echo 'Cant\'t count the sum of the Fibonacci number sequence for a negative number' . PHP_EOL . PHP_EOL;
	else if ($number>0) {
	$array = [0,1];
	for ($i=2; $i<$number; $i++)
	{
		$array[$i] = $array[$i-1] + $array[$i-2];
	}	
	echo "The sum of the $number Fibonacci number sequence equals: ";
	echo array_sum($array);
	echo PHP_EOL;
	echo PHP_EOL;
	}
	else echo 'Unexpected error' . PHP_EOL;
	
	
}
	


fibonacci_Sum(0);
fibonacci_Sum(1);
fibonacci_Sum(15);
fibonacci_Sum(-1);
fibonacci_Sum(6);