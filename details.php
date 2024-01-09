<?php 

    // we also need to connect with our database in other to get the parameter we need 
    include('config/DBconnect.php');

    // check get request id param :- here we want to get the id parameter from the url above in the browser   -- the id in the first place is gotten throuh the index.php page where we added the more button
    if(isset($_GET['id'])){
        // first we need avoid input of malicious code using the real escape character even if we are clicking the load more button to get here users an still enter an id at the url of the broser and we want to avoid all this so we create a variable to store this operation 
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        // make a seqel that we are going to use to make the querey:- here we are selecting one individual data 
        $sql = "SELECT * FROM pizza WHERE  id = $id";

        // gettinr the querey result:- more like connecting your connection with your sequel statement
        $result = mysqli_query($conn, $sql);
        // $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Error in SQL query: " . mysqli_error($conn));
            }

        // fetch the result in array format so as to asses the individual item in the colomn remember there are 4 coloumn thats is we are to asses 4 id 
        // here we also want to get a single item in  a wrole at a time not like the others where we get all the complete wrole 
        $pizza = mysqli_fetch_assoc($result);  

        // free the result and close the connection 
        mysqli_free_result($result);  
        mysqli_close($conn); 

        // print_r($pizza);

    }

    // if the delete form is clicked we need t write the if statement that would take care of the total opperation 
    if(isset($_POST['delete'])){
        // here we are safeguarding sql injection and trying to get the value of the id from the hidden delete input form in the delete form bellow
        // note that single quote cant be used to write sql state ment especially when using delete 
        $idToDelete = mysqli_real_escape_string($conn, $_POST['idToDelete']);
        $sqlToDelete = "DELETE FROM pizza WHERE id = $idToDelete";
        if(mysqli_query($conn, $sqlToDelete)){
            // if the above is followed correctly this is success 
            // if this is a success we want to redirect the user to another page 
            header('location: index.php');
        }else{
            // if the above is not  followed correctly this is a failure
            echo 'query error:' . mysqli_error($conn);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>
        <div class="container center">
            <!-- the if statement is to check if the pizza really exist  -->
            <?php if($pizza){ ?>
                <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
                <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
                <p><?php echo date($pizza['created_at']); ?></p>
                <h5>Ingridients</h5>
                <p><?php echo htmlspecialchars($pizza['ingridients']); ?></p>

                <!-- we are adding delete here because if there is a pizza then we can delete it  but if we add it to the else block it not making sense cus that block is for things that do not exist  -->
                <!-- we are making use of a form for the delete system  -->
                <form action="details.php" method='POST'>
                    <input type="hidden" name='idToDelete' value="<?php echo $pizza['id'] ?>">
                    <input type="submit" name='delete' value = 'Delete' class='btn brand z-depth-0'>
                </form>

    
            <?php } else{ ?>
                <h5>no pizza of such</h5>
            <?php } ?>
        </div>
    <?php include('templates/footer.php'); ?>




</html>