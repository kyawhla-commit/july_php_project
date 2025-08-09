<?php

namespace Helpers;

class HTTP
{
    static $base = "http://localhost/1030/july_php_project";

    static function redirect($path, $q = "")
    {
        $url = static::$base . $path;
        if($q) $url .= "?$q";  

        header("location: $url");
        exit();
    }
}