<?php

if (!function_exists('testHelper')) {
    /**
     * @return string
     */
    function testHelper(): string
    {
        return "testHelper";
    }
}



if (!function_exists('getLimit')) {
    function getLimit($limit = null): int
    {
        $default = 20;
        $max = 1000;
        if (is_numeric($limit)) {
            $perPage = intval($limit);
        } else {
            $perPage = request()->input($limit ?? 'limit', $default);
        }
        $perPage = min($perPage, $max);
        return $perPage <= 0 ? $default : $perPage;
    }
}

if (!function_exists('getOffset')) {
    function getOffset($key = 'skip')
    {
        return request()->input($key);
    }
}


