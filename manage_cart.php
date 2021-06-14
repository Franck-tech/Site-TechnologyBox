
<?php
     
     session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){

  if(isset($_POST['Add_To_Cart'])){

      if(isset($_SESSION['cart'])){

        $myitems= array_column($_SESSION['cart'],'Item_name');
        if(in_array($_POST['Name'],$myitems)){
          echo "<script>
            alert('Item not Added');
            window.location.href='index1.php';
          </script>";
        }else{
              
          $count=count($_SESSION['cart']);
          $_SESSION['cart'][$count]=array('Item_name'=>$_POST['Name'],'Price'=>$_POST['Price'],'Offer'=>$_POST['Offer'],'Quantity'=>$_POST['Quantity']);
          echo "<script>
          window.location.href='mycart.php';
          </script>";
        }
      }else{

           $_SESSION['cart'][0]=array('Item_name'=>$_POST[$row['Name']],'Price'=>$_POST[$row['Price']],'Offer'=>$_POST['Offer'],'Quantity'=>$_POST['Quantity']);
           echo "<script>
           alert('Item Added');
           window.location.href='mycart.php';
         </script>";
        }
  } 
  if(isset($_POST['Remove_Item'])){
      foreach($_SESSION['cart'] as $key => $value)
      {
        if($value['Item_name']==$_POST['Item_name']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            header("location: mycart.php");
      }
  }
 }
}
?>
