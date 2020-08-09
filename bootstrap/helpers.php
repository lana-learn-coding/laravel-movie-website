<?php
function route_with_query($name, $queryParameters = [], $parameters = [], $absolute = true)
{
    $route = route($name, $parameters, $absolute);
    if (!empty($queryParameters)) {
        $route = $route . '?' . http_build_query($queryParameters);
    }
    return $route;
}

function url_with_query($path = null, $queryParameters = [], $parameters = [], $secure = null)
{
    $url = url($path, $parameters, $secure);
    if (!empty($queryParameters)) {
        $url = $url . '?' . http_build_query($queryParameters);
    }
    return $url;
}

function path_join($segments, $glue = DIRECTORY_SEPARATOR)
{
    return implode($glue, $segments);
}
