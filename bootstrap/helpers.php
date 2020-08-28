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

function moveAetherUploadedVideoToPublicStorageAndGetUrl($uploadedPath)
{
    $path = implode(DIRECTORY_SEPARATOR, explode('_', $uploadedPath));
    $ext = pathinfo($path, PATHINFO_EXTENSION);

    $saveFilename = uniqid() . uniqid() . '.' . $ext;
    $savePath = path_join(['public', 'videos', $saveFilename]);

    Storage::move(path_join(['aetherupload', $path]), $savePath);
    return 'videos/' . $saveFilename;
}

function getIp()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip); // just to be safe
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    return $ip;
                }
            }
        }
    }
    return Request::ip();
}
