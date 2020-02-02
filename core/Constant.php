<?php

    // $protocol = ($_SERVER['SERVER_PORT'] == '80') ? 'http://' : 'https://';
    // $host = $_SERVER['HTTP_HOST'];
    // $url = trim($_SERVER['SCRIPT_NAME'], '/');
    // $url = explode('/', $url);
    //     array_pop($url);
    // $url = implode("/", $url);

    // $base_url = implode('/', [$protocol, $host, $url]);

    $base_directory = dirname(__DIR__);

    // define("URI", $base_url);
    define("BASEDIR", $base_directory);
    
