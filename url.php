<?php
/*
 * Реализуйте абстракцию для работы с урлами. Она должна извлекать и менять
 * части адреса. Интерфейс:

make($url) - Конструктор. Создает урл.
setScheme($data, $scheme) - Сеттер. Меняет схему.
getSchema($data) - Селектор (геттер). Извлекает схему.
setHost($data, $host) - Сеттер. Меняет хост.
getHost($data) - Геттер. Извлекает хост.
setPath($data, $path) - Сеттер. Меняет строку запроса.
getPath($data) - Геттер. Извлекает строку запроса.
setQueryParam($data, $key, $value) - Сеттер. Устанавливает значение для
параметра запроса.
getQueryParam($data, $paramName, $default = null) - Геттер. Извлекает значение
для параметра запроса. Третьим параметром функция принимает значение по
умолчанию, которое возвращается тогда, когда в запросе не было такого
параметра
toString($data) - Геттер. Преобразует урл в строковой вид.

$url = Url\make("https://hexlet.io/community?q=low");
'https://hexlet.io/community?q=low', Url\toString($url));

$url = Url\setScheme($url, 'http');
Url\toString($url)); // 'http://hexlet.io/community?q=low'

$url = Url\setPath($url, '/404');
Url\toString($url)); // 'http://hexlet.io/404?q=low'

$url = Url\setQueryParam($url, 'page', 5);
Url\toString($url)); // 'http://hexlet.io/404?q=low&page=5'

$url = Url\setQueryParam($url, 'q', 'high');
Url\toString($url)); // 'http://hexlet.io/404?q=high&page=5'

$url = Url\setQueryParam($url, 'q', null);
Url\toString($url)); // 'http://hexlet.io/404?page=5'
 */

namespace App\Url;

// BEGIN (write your solution here)
function make($url)
{
    return parse_url($url);
}

function setScheme($data, $scheme)
{
    $data['scheme'] = $scheme;
    return $data;
}

function getSchema($data)
{
    return $data['scheme'];
}

function setHost($data, $host)
{
    $data['host'] = $host;
    return $data;
}

function getHost($data)
{
    return $data['host'];
}

function setPath($data, $path)
{
    $data['path'] = $path;
    return $data;
}

function getPath($data)
{
    return $data['path'];
}

function getQueryParam($data, $paramName, $default = null)
{
    if (array_key_exists('query', $data)) {
        parse_str($data['query'], $parseQuery);
        return array_key_exists($paramName, $parseQuery) ? $parseQuery[$paramName] : $default;
    } else {
        return null;
    }
}

function setQueryParam($data, $key, $value)
{
    parse_str($data['query'], $parseQuery);
    $parseQuery[$key] = $value;
    $data['query'] = http_build_query($parseQuery);
    return $data;
}

function toString($data)
{
    $scheme = getSchema($data);
    $host = getHost($data);
    $path = getPath($data);
    if (array_key_exists('query', $data)) {
        $query = $data['query'];
        return "{$scheme}://{$host}{$path}?{$query}";
    }
    return "{$scheme}://{$host}{$path}";
}
// END
