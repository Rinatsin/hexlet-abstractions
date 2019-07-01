<?php
/*
Реализуйте абстракцию (набор функций) для работы с прямоугольниками, стороны
которого всегда параллельны осям. Прямоугольник может располагаться в любом
месте координатной плоскости.

При такой постановке, достаточно знать только три параметра для однозначного
задания прямоугольника на плоскости: координаты левой-верхней точки, ширину
и высоту. Зная их, мы всегда можем построить прямоугольник одним единственным
способом.

      |
    4 |    точка   ширина
      |       *-------------
    3 |       |            |
      |       |            | высота
    2 |       |            |
      |       --------------
    1 |
      |
------|---------------------------
    0 |  1   2   3   4   5   6   7
      |
      |
      |
Основной интерфейс:

makeRectangle (конструктор) – создает прямоугольник. Принимает параметры:
левую-верхнюю точку, ширину и высоту. Ширина и высота – положительные числа.
Селекторы getStartPoint, getWidth и getHeight

isContainsTheOrigin – проверяет, принадлежит ли центр координат прямоугольнику
(не лежит на границе прямоугольника, а находится внутри). Чтобы в этом
убедиться, достаточно проверить, что все точки прямоугольника лежат в разных
квадрантах (их можно высчитать в момент проверки).

<?php

// Создание прямоугольника:
// p - левая верхняя точка
// 4 - ширина
// 5 - высота
//
// p    4
// -----------
// |         |
// |         | 5
// |         |
// -----------

$p = makeDecartPoint(0, 1);
$rectangle = makeRectangle($p, 4, 5);

isContainsTheOrigin($rectangle); // false

$rectangle2 = makeRectangle(makeDecartPoint(-4, 3), 5, 4);
isContainsTheOrigin($rectangle2); // true

Решение учителя

// BEGIN
function makeRectangle($point, $width, $height)
{
    return [
        'point' => $point,
        'width' => $width,
        'height' => $height
    ];
}

function getStartPoint($rectangle)
{
    return $rectangle['point'];
}

function getWidth($rectangle)
{
    return $rectangle['width'];
}

function getHeight($rectangle)
{
    return $rectangle['height'];
}

function isContainsTheOrigin($rectangle)
{
    $point1 = getStartPoint($rectangle);
    $point2 = makeDecartPoint(getX($point1) + getWidth($rectangle), getY($point1) - getHeight($rectangle));
    return getQuadrant($point1) === 2 && getQuadrant($point2) === 4;
}
// END
 */


namespace App\Rectangle;

use function App\Points\makeDecartPoint;
use function App\Points\getX;
use function App\Points\getY;
use function App\Points\getQuadrant;

// BEGIN (write your solution here)
function makeRectangle($startPoint, $width, $height)
{
    return [
        'startPoint' => $startPoint,
        'width' => $width,
        'height' => $height
    ];
}

function getStartPoint($rectangle)
{
    return $rectangle['startPoint'];
}

function getWidth($rectangle)
{
    return $rectangle['width'];
}

function getHeight($rectangle)
{
    return $rectangle['height'];
}

function getTopRightPoint($rectangle)
{
    return [
        'x' => getStartPoint($rectangle)['x'] + getWidth($rectangle),
        'y' => getStartPoint($rectangle)['y']
    ];
}

function getBottomRightPoint($rectangle)
{
    return [
        'x' => getStartPoint($rectangle)['x'] + getWidth($rectangle),
        'y' => getStartPoint($rectangle)['y'] - getHeight($rectangle)
    ];
}

function getBottomLeftPoint($rectangle)
{
    return [
        'x' => getStartPoint($rectangle)['x'],
        'y' => getStartPoint($rectangle)['y'] - getHeight($rectangle)
    ];
}

function isContainsTheOrigin($rectangle)
{
    $container = [];
    $container[] = getQuadrant(getStartPoint($rectangle));
    $container[] = getQuadrant(getTopRightPoint($rectangle));
    $container[] = getQuadrant(getBottomRightPoint($rectangle));
    $container[] = getQuadrant(getBottomLeftPoint($rectangle));
    $result = array_unique($container);
    return count($result) === 4 ? true : false;
}
// END
