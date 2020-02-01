<?php

require(__DIR__."/core/Loader.php");

$PHPTemplate = new PHPTemplate();

$PHPTemplate->template("template/template");
$PHPTemplate->content("content/content");
$PHPTemplate->component("component/component");
$PHPTemplate->data(['description' => 'This is example that i make to entertain you how to understand the flow of PHPTemplate. Make it easier with PHPTemplate. Enjoy :)']);

$PHPTemplate->view();
