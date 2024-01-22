<?php  

    // in other to save to the database from a page u need to connect to the page first 
    include('config/DBconnect.php');





    $email=$title=$ingridients = '';
   $errors = array('email' => '', 'title' => '', 'ingridients' => '');

    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['email']);
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['ingridients']);


        // chkecking email 
        if(empty($_POST['email'])){
            $errors['email'] = 'an email is require <br/>';
        }
        else{
            $email = $_POST['email'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'email must be a valid email address <br/>' ;
            }
        }



        // chkecking title
        if(empty($_POST['title'])){
            $errors['title'] = 'a title is require <br/>' ;
        }
        else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'title most be letters and space only <br/>';
            }
        }


        // chkecking ingridients
        if(empty($_POST['ingridients'])){
            $errors['ingridients'] = 'an ingridient is require <br/>';
        }
        else{
            $ingridients = $_POST['ingridients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingridients)){
                $errors['ingridients'] = 'ingridients most be commer seperated letters <br/>';
            }
        }

        // checking if all the above are correct 
        if(array_filter($errors)){
            // echo 'error in the form';
        }
        else{
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingridients = mysqli_real_escape_string($conn, $_POST['ingridients']);

            // creating sql string that would help us import the data into the database 
            // for the pizza(title,email,ingridients) that is the table and the columns while VALUES('$ttle','$email','$ingridients')' is the value of the respsective coluns
            $sqladd = "INSERT INTO pizza(title,email,ingridients) VALUES('$title','$email','$ingridients')";

            // save sql to database and check that it works
            if(mysqli_query($conn,$sqladd)){
                // if thats true thats a success and redirect them to a page
                 header('location:index.php');

            }else{
                // there would be some kind of erro 
                echo 'query error:' . mysqli_error($conn);
            }

        }




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
    <?php include('templates/header.php');  ?>


    <section class="container grey-text">
        <h4 class="center">Add pizza</h4>
        <!-- <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST' class="white">  there are some times u can use in the action atribute u can use php built in superglobols in this case even when u change the page name manually the superglobal will retain the name of the new page its work is to get the name of that page at any given time -->
        <form action="add.php" method='POST' class="white">
            <label for="">Your Email:</label>
            <input type="text" name='email' value='<?php echo  htmlspecialchars($email); ?>'>
            <div class="red-text"> <?php echo $errors['email']; ?> </div>



            <label for="">Pizza Title:</label>
            <input type="text" name='title' value='<?php echo htmlspecialchars($title); ?>'>
            <div class="red-text"> <?php echo $errors['title']; ?> </div>


            <label for="">Ingridients (comma seperated):</label>
            <input type="text" name='ingridients' value='<?php echo htmlspecialchars($ingridients); ?>'>
            <div class="red-text"> <?php echo $errors['ingridients']; ?> </div>


            <div class="center">
                <input type="submit" name='submit' value='submit' class='btn brand z-depth-0'>
            </div>
        </form>
    </section>



    <?php include('templates/footer.php');  ?>
</body>
</html>