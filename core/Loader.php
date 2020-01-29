<?php

    require_once("Constant.php");

    spl_autoload_register(function( $c ) {
        require_once($c . ".php");
    });