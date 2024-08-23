<?php

declare(strict_types=1);
// Function to add two integers
function addition(int $a, int $b): int
{
    $c = $a + $b;
    return $c;
}

echo addition(3, 4); // Output: 7
echo '<br>';
echo 'function two';

function division_even(int $a, int $b): int
{
    $c = ($a + $b) / 2;
    return $c;
}

echo division_even(3, 4); // Output: 3.5
