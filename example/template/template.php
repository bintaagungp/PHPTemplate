<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo APPPATH; ?>/bootstrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #e67d5a;
            font-family: 'Nunito', sans-serif;
            font-weight: 900;
        }
        .full-d{
            height: 100vh;
        }
        .container {
            max-width: 600px;
        }
    </style>
    <title>PHPTemplate | example</title>
</head>
<body class="container text-center full-d">
    <div class="d-flex flex-column justify-content-center full-d">

        <!-- |==   content   ===============================| -->

        <?php $this->load_content(); ?>
        
        <!-- |==============================================| -->

        <footer class="mt-auto">
            <p>Made with &hearts; by Bakpaooo &#128522;</p>
        </footer>
    </div>
</body>
</html>