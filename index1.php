<?php
     session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" media="screen">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="index.js" defer></script>
    <title>Technology_Box - index</title>
</head>
<body>
    <nav>
        <h1>Technology_Box</h1>
        <div class="onglets">
            <a href="#">Home</a>
            <a href="#products">Products</a>
            <a href="#blog">Blog</a>
            <a href="mycart.php">Shop</a>
            <a href="#footer">Contact us</a>
        </div>
        <form action="">
            <input type="search" name="search" id="search" placeholder="Search">
        </form>
          <a href="mycart.php"><img src="assets/icones/shopping-cart.png" alt="" srcset="" class="shop"></a> 
          <a href="inscription.php" class="user"><img src="assets/icones/user.png" alt="" srcset="" class="user"></a>
    </nav>
   
    <?php require 'header.php';?>
     
    <section id="phones">
         <div class="container">
             <h2>Produits Exclusive</h2>
             <div class="choix">
                 <a href="#phones">Phones</a>
                 <a href="#computer">Computers</a>
                 <a href="#equipement">Equipment</a>
                 <a href="#Specials offer">Specials offer</a>
             </div>
         </div>       
    </section>



      <section id="products">

           <?php   

               $connect = mysqli_connect("localhost:3308", "root", "","technologybox");

              ?>

      <div class="container-fluid" >
            <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                         <div class="col-md-12">
                               <div class="row-cols-lg-4">    

                              <?php
                                   $query = "SELECT * FROM phones";
                                   $result = mysqli_query($connect,$query);

                                   while ($row = mysqli_fetch_array($result)){?>

                                   <section class="main">
                                   <div class="content" style='margin: 50px 5px 10px 10px;height: 450px; '>
                                  <div class="card" style='width:300px;border-radius:10px; height:390px; padding:0px;'>
                                     <div class="col-md-12">
                                     <form action="manage_cart.php?id=<?=$row['id'] ?>" method="POST">
                                    <a href=""><img src="assets/img/phones/<?= $row['image'] ?>" alt=""
                                     style= 'width:300px;height:212px;border-radius:10px;outline:none;'></a>
                                     <h5 class="text-center"><?= $row['name']; ?></h5
                                     style='witdh:200px'>
                                     <h5 class="text-center">$<?= number_format($row['price'],2); ?></h5
                                     style='witdh:200px'>
                                     <input type="hidden" name="Name" value="<?= $row['name'] ?>">
                                     <input type="hidden" name="Price" value="<?= $row['price'] ?>">
                                     <input type="hidden" name="Offer" value="<?= $row['offre'] ?>">
                                     <input type="number" name="Quantity" value="1" class="form-control"
                                     style='width:300px;margin-top:5px; text-align:center;'>
                                     <div class="icon">
                                        <a href="mycart.php"><img src="assets/icones/shopping-cart.png" alt="" srcset=""></a>
                                        <a href="#"><img src="assets/icones/search-1.png" alt="" srcset=""></a>
                                        <a href="#"><img src="assets/icones/heart.png" alt="" srcset=""></a>
                                     </div>
                                     <input type="submit" name="Add_To_Cart" class="btn btn-warning my-2" value="Add to Basket"
                                      style= 'Background-color:rgb(177, 209, 177); width:300px;border-radius: 5px 5px 10px 10px; border:green;'>
                                     </form>
                                     </div>
                                </div>
                                </div>  
                                </section>
                                <?php } ?>
                            </div>
                          </div>
                        </div>

                </div>
            </div>
      </div>
      
      </section>

   <?php
     include('Computer.php');
   ?>
   <?php
     include('Equipement.php');
   ?>
   <?php
      include('Specials offer.php');
   ?>
  
   <?php require 'footer.php';?>  

   <script src="assets/js/bootstrap.js"></script>
</body>
</html>
