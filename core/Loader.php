<?php

    require_once("Constant.php");

    $data = spl_autoload_register(function( $class ) {
        if ( $class == "PHPTemplate" ) {
            require_once($class . ".php");
        }
    });