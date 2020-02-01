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