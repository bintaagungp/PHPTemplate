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
        }
    </style>
    <title>PHPTemplate | example</title>
</head>
<body>

    <!-- 
      CONTENT -------------------------------------
     -->
     <?php $this->load_content(); ?>
    <!-- 
      -----------------------------------------------
     -->

</body>
</html>