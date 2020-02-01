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
    <link href="https://fonts.googleapis.com/css?family=Nunito:700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;  
            margin: 0;
            font-family: 'Nunito', sans-serif;
        }
        h1 {
            line-height: 1.2;
            font-size: 2.5rem;
            margin-bottom: .5rem;
        }
        p {
            margin-bottom: 1rem;
        }        
        button {
            padding: 10px 20px;
            border: 1px solid #000000;
            outline: none;
            font-size: 13px;
            border-radius: 5px;
            background: none;
            cursor: pointer;
            transition: .2s all ease-out;
        }
        button:hover, button:focus {
            background: #000000;
            color: #ffffff;
        }
        body {
            background-color: #f0c930;
        }
        .container {
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 15px 0 15px;
            text-align: center;
        }
        .full-h {
            height: 100vh;
        }
        .flex {
            display: flex !important;
            flex-direction: column;
            justify-content: center;
        }
        .mar-top-auto {
            margin-top: auto;
        }
    </style>
    <title>PHPTemplate | example</title>
</head>
<body class="container full-h">
    <div class="flex full-h">

        <!-- |==   content   ===============================| -->

        <?php $this->load_content(); ?>
        
        <!-- |==============================================| -->

        <footer class="mar-top-auto">
            <p>Made with &hearts; by Bakpaooo &#128522;</p>
        </footer>
    </div>
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