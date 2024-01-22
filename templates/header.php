<?php 
    session_start();
    // $name = $_SESSION['name'];
    
    if($_SERVER['QUERY_STRING'] == 'noname'){
        unset($_SESSION['name']);
    }
    $name = $_SESSION['name'] ?? ''; 
    // the ?? is called the no calless operator used to return a value if something does not exist 

    // get cookie 
    $gender = $_COOKIE['gender'] ?? 'unknown';
    // whenever u select from the option either male or female the cookie gets it but if noting is selected it would say unknown 
 ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja pizza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type='text/css'>
        .brand{
            background:#cbb09c !important;
        }
        .brandText{
            color:#cbb09c !important;
        }
        form{
            max-width:460px;
            margin:20px auto;
            padding:20px;
        }
        .pizzaImg{
            width:100px;
            margin:20px auto -30px;
            display:block;
            position:relative;
            top:-30px;
        }
    </style>
</head>
<body class='grey lighten-3'>
    <nav class='white z-depth-0'>
        <div class="container">
            <a href="index.php" class='brand-logo brandText'>Ninja Pizza</a>
            <ul id='nav-mobile' class='right hide-on-small-and-down'>
                <li class='grey-text'>Hello <?php echo htmlspecialchars($name); ?></li>
                <li class='grey-text'>(<?php echo htmlspecialchars($gender); ?>)</li>
                <li><a href="add.php" class='btn brand z-depth-0'>Add a Pizza</a></li>
            </ul>
        </div>
    </nav>