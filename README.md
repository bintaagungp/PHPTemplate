# PHPTemplate
Make it simple view loader with PHPTemplate.

## How to use
---
Declare something like this :
```PHP
require(__DIR__."/Autoload.php");

$data = new PHPTemplate(String view_directory);

$data->template(String template_directory);
$data->content(String content_directory);
$data->component(String component_directory);
$data->data(Array some_data);
$data->view();
```
## Example
---
Example folder :
* \ bootstrap
* \ example
  * \ component
    * component.php
  * \ content
    * content.php
  * \ template
    * template.php
---
component.php :
```html
<button type="button" class="btn btn-outline-secondary">This is component</button>
```
content.php :
```html
<div class="container text-center d-flex flex-column justify-content-center">
  <h1>Content Example</h1>
  <p><?php echo $description; ?></p>
  <p>

    <?php $this->load_component("component/component"); ?>
  
  </p>
</div>
```
template.php :
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo APPPATH; ?>/bootstrap/css/bootstrap.css">
    <style>
        body {
            background-color: #e67d5a;
        }
        .container {
            height: 100vh;
            max-width: 600px
        }
    </style>
    <title>PHPTemplate | example</title>
</head>
<body>

     <?php $this->load_content(); ?>

</body>
</html>
```
---
First, you need to require PHPTemplate, add some code like this :
```php
require(__DIR__."/Autoload.php");
```
---
Get the instance of PHPTemplate :
```php
$PHPTemplate = new PHPTemplate(__DIR__.'/example');
```
---
Then, register the template, content, component and data that you want to use : 
```PHP
$PHPTemplate->template("template/template");
$PHPTemplate->content("content/content");
$PHPTemplate->component("component/component");
$PHPTemplate->data(['description' => 'This is example that i make to entertain you how to understand the flow of PHPTemplate. Make it easier with PHPTemplate. Enjoy :)']);
```
---
Render view template :
```php
$PHPTemplate->view();
```