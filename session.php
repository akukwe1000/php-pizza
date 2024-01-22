<?php
// session  a session does not store data on a user computer like a cookie would but instead store data on the server
// session is more like the server keeping track of infomation as u do different things on the website 

if(isset($_POST['submit'])){
    // before we asses any session we have to start it first 
    session_start();
    $_SESSION['name'] = $_POST['name'];
    // echo $_SESSION['name'];
    header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST'>
        <input type="text" name='name'>
        <input type="submit" name='submit' value='submit'>
    </form>
</body>
</html>