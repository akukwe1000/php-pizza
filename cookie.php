<?php
// session  a session does not store data on a user computer like a cookie would but instead store data on the server
// session is more like the server keeping track of infomation as u do different things on the website 

if(isset($_POST['submit'])){

    // cookie for gender 
    // the first gender there is just me giving the cookie a name and this is neccesary in the cookie generation 
    // the post[gender] is the select tag value when it is selected either male of female 
    // and the time is when the cookie is going to expire cus coookie dont last for long  note that 86400 is the total seconds in a day that is this cookie would las for a day 
    setcookie('gender', $_POST['gender'],time() + 86400);
    // this cookie was gotten on the header.php 




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
        <select name="gender" id="">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" name='submit' value='submit'>
    </form>
</body>
</html>