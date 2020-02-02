<?php
    
    require_once(__DIR__."\\autoload.php");

    $PHPTemplate = new PHPTemplate;

    $PHPTemplate->template("template/template");
    $PHPTemplate->content("content/content");
    $PHPTemplate->component("component/component");
    $PHPTemplate->data(['name' => ['binta', 'agung'],'description' => 'This is example that i make to entertain you how to understand the flow of PHPTemplate. Make it easier with PHPTemplate. Enjoy :)']);

    $PHPTemplate->view();