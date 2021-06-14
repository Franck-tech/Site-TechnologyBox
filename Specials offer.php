<section>

<?php   

    $connect = mysqli_connect("localhost:3308", "root", "","technologybox");

   ?>

<div class="container-fluid" id="Specials offer">
 <div class="col-md-12">
         <div class="row">
             <div class="col-md-12">
              <div class="col-md-12">
                    <div class="row-cols-lg-4">    
              
                   <?php
                        $query = "SELECT * FROM offer";
                        $result = mysqli_query($connect,$query);

                        while ($row = mysqli_fetch_array($result)){?>
                        <section class="main">
                        <div class="content" style='margin: 50px 5px 10px 10px;height: 450px; '>
                       <div class="card" style='width:300px;border-radius:10px; height:390px; padding:0px;'>
                          <div class="col-md-12">
                          <form action="manage_cart.php?id=<?=$row['id'] ?>" method="POST">
                         <a href=""><img src="assets/img/offer/<?= $row['image'] ?>" alt=""
                          style= 'width:300px;height:212px;border-radius:10px;outline:none;'></a> 
                          <h5 class="text-center"><?= $row['name']; ?></h5
                          style='witdh:200px'>
                          <h5 class="text-center">$<s><?= number_format($row['price'],2); ?></s></h5
                          style='witdh:200px'>
                          <h5 class="text-center">$<?= number_format($row['offer'],2); ?></h5
                          style='witdh:200px'>
                          <input type="hidden" name="Name" value="<?= $row['name'] ?>">
                          <input type="hidden" name="Offer" value="<?= $row['offer'] ?>">
                          <input type="number" name="Quantity" value="1" class="form-control"
                          style='width:300px;margin-top:5px;text-align:center;'>
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
                     <?php }

                   ?>
                 </div>
               </div>
             </div>
    
     </div>
 </div>
</div>

</section>