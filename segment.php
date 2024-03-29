<?php
/*
Отрезок - еще один графический примитив. В коде описывается парой точек, одна из которых - начало отрезка,
другая - конец. Обычный отрезок не имеет направления, поэтому вы сами вольны выбирать то, какую точку
считать началом, а какую концом.

В этом задании подразумевается, что вы уже понимаете принцип построения абстракции и способны
самостоятельно принять решение о том, как она будет реализована. Напомню, что сделать это можно
разными способами и нет одного правильного.

src\Segments.php
Реализуйте указанные ниже функции:

makeSegment. Принимает на вход две точки и возвращает отрезок.
getMidpointOfSegment. Принимает на вход отрезок и возвращает точку находящуюся на середине отрезка.
<?php

$segment = makeSegment(makeDecartPoint(3, 2), makeDecartPoint(0, 0));
getMidpointOfSegment($segment); // => (1.5, 1)
Подсказки
Средняя точка вычисляется по формуле x = (x1 + x2) / 2 и y = (y1 + y2) / 2.
 */

namespace App\Segments;

use function App\Points\makeDecartPoint;
use function App\Points\getX;
use function App\Points\getY;

// BEGIN (write your solution here)
function makeSegment($point1, $point2)
{
    return [
        'point1' => $point1,
        'point2' => $point2
    ];
}

function getBeginPoint($segment)
{
    return $segment['point1'];
}

function getEndPoint($segment)
{
    return $segment['point2'];
}

function getMidpointOfSegment($segment)
{
    $beginPoint = getBeginPoint($segment);
    $endPoint = getEndPoint($segment);
    $x = (getX($beginPoint) + getX($endPoint)) / 2;
    $y = (getY($beginPoint) + getY($endPoint)) / 2;
    return makeDecartPoint($x, $y);
}
// END
