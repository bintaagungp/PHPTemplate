# PHPTemplating
Make it simple view loader with PHPTemplating.

## How to use
---
You can just simply use this :
```PHP
$PHPTemplate = new PHPTemplate(String view_directory);

$PHPTemplate->view(String template_path, String content_path, Array data);
```
## Example
---
Example folder :
* example
  * content
    * content.php
  * template
    * template.php
```PHP
$PHPTemplate = new PHPTemplate('./example');

$PHPTemplate->view('template/template', 'content/content', ['data' => 'data']);
```

---