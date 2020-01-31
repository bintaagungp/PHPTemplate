<?php

require(__DIR__."/core/Loader.php");

$data = new PHPTemplate(__DIR__.'/example/');
$data->template("template/template");
$data->content("content/content");
$data->component("component/component");
$data->data(['description' => 'This is example that i make to entertain you how to understand the flow of PHPTemplate. Make it easier with PHPTemplate. Enjoy :)']);
$data->view();
