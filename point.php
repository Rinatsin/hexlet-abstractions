<?php

namespace App\Points;

// BEGIN (write your solution here)
function calculateDistance(array $point1, array $point2)
{
    [$x1, $y1] = $point1;
    [$x2, $y2] = $point2;
    $dx = $x1 - $x2;
    $dy = $y1 - $y2;
    return sqrt(pow($dx, 2)  + pow($dy, 2));
}
