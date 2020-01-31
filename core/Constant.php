<?php

    $data = ($_SERVER['SERVER_PORT'] == '80') ? 'http://' : 'https://';
    $data .= $_SERVER['HTTP_HOST'];
    $data .= str_replace('Autoload.php', '', $_SERVER['REQUEST_URI']);
    
    define("APPPATH", $data);
    
