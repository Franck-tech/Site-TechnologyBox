<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mycart.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>My cart</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                    <?php 
                        if(!$_SESSION['FirstName']){
                            header('location: inscription.php');
                            echo "<h1>"."My CART"."</h1>";
                        }else{
                            echo "<h1>" ."CART" ." "."of"." ".$_SESSION['FirstName'] ." "."</h1>"; 
                        }    
                    ?>  
                    
                    </div>
                <div class="col-lg-8">
                        <table class="table">
                                <thead class="text-center">
                                    <tr>
                                    <th scope="col">Serial N°</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Action</th>
                                    </tr>  
                            </thead>
                            <tbody class="text-center">
                                <?php
                                    $total=0;
                                    if(isset($_SESSION['cart'])){
                                    foreach($_SESSION['cart'] as $key => $value){
                                        $total=($total+($value['Price']*$value['Quantity']));
                                        echo"
                                        <tr>
                                        <td>1</td>
                                        <td>$value[Item_name]</td>
                                        <td>$value[Price]</td>
                                        <td><input type='number' class='text-center' value='$value[Quantity]' min='1' max='100'></td>
                                        <td>
                                        <form action='manage_cart.php' method='POST'>
                                        <button class='btn btn-sm btn-outline-danger' name='Remove_Item'>REMOVE</button>
                                        <input type='hidden' name='Item_name' value='$value[Item_name]'>
                                        </form>
                                        </td>
                                        </tr>
                                        ";
                                    }
                                    }
                                ?>
                                </tbody>
                        </table>
                        >
                </div>
                   
                <div class="col-lg-3">
                    <div class="border bg-light rounded p-4 total">
                        <h4>Total</h4>
                        <h5 class="text-center"><?php echo $total ?></h5><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                Pay to recover after
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                Cash on Delivery
                                </label>
                            </div>
                                <br>
                        <form action="">
                           <button class="btn btn-primary btn-block">Make Purchase</button>
                         </form>


                    </div>
                </div>

        </div>
    </div>

    <?php
              
    ?>
</body>
</html>