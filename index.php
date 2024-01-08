<?php
    // connecting to database 
    include('config/DBconnect.php');



    // write query for all pizzas 
    $sql = 'SELECT title,ingridients,id FROM pizza order by created_at';

    // make query and get result 
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array 
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); 

    
    // print_r($pizzas);


        // to free result from  memory  (good practice)
    mysqli_free_result($result);
    // close connection 
    mysqli_close($conn);

    // print_r(explode('and' , $pizzas[0]['ingridients']))

            // mysql insert under coloumn command line 
    // insert into employees 
    // values (1,'favour','akukwe',25.00,'2023-01-04'),
	//    (2,'blessing','okposin',20.00,'2023-01-05'),
    //    (3,'francis','edem',18.00,'2023-01-06'),
    //    (4,'moris','edem',15.00,'2023-01-07');


    




?>


<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    <h4 class='center grey-text'>pizzas!</h4>

   

    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza){ ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <ul>
                                <!-- the controll flow using colomn and usind endforeach at the end  -->
                                <?php foreach(explode('and' , $pizza['ingridients']) as $ingridient):?>
                                    <li>
                                        <?php echo htmlspecialchars($ingridient); ?>
                                    </li>
                                <?php endforeach;?>
                            </ul>

                            <!-- <div><?php echo htmlspecialchars($pizza['ingridients']); ?></div> -->


                        </div>
                        <div class="card-action right-align">
                            <!-- using a querey string to get a single record more like the id alone  -->
                            <a href="details.php?id= <?php echo $pizza['id'] ?>" class = 'brandText'>More Info</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
                                    <!-- php if and else statement -->
            <?php if(count($pizzas) >= 2 ){ ?>
                <p>there are two or more pizzas</p>
            <?php } else{ ?>
                        <p>there are less than two pizzas</p>
                <?php } ?>

                <!-- control flow if and else statement
            <?php if(count($pizzas) >= 2 ): ?>
                <p>there are two or more pizzas</p>
            <?php  else: ?>
                        <p>there are less than two pizzas</p>
                <?php endif ?> -->



        </div>

    </div>
    <?php include('templates/footer.php'); ?> 




</html>