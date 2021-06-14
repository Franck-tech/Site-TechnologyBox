<?php
 $connect = mysqli_connect("localhost:3308", "root", "","technologybox");

error_reporting(0);

 if(isset($_POST['submit'])){
     $Firstname = $_POST['Firstname'];
     $Lastname = $_POST['Lastname'];
     $Email = $_POST['Email'];
     $Address = $_POST['Address'];
     $Password = md5($_POST['Password']);
     $Confirmpassword = md5($_POST['Confirmpassword']);

     if($Password == $Confirmpassword){
        
        $sql = "SELECT * FROM inscription WHERE Email='$Email' AND Password ='$Password'";
        $result = mysqli_query($connect,$sql);
        if(!$result->num_rows > 0){
            $sql = "INSERT INTO inscription (FirstName,Lastname,Email,Address,Password,Confirmpassword)
            VALUES ('$Firstname','$Lastname','$Email','$Address','$Password','$Confirmpassword')";
            $result = mysqli_query($connect,$sql);
            header("location: connexion.php");
            if(!$result){
                echo "<script>alert('Woops!! Something wrong went.')</script>";
              $Firstname = "";
              $Lastname = "";
              $Email = "";
              $Address = "";
              $_POST['Password'] = "";
              $_POST['Confirmpassword'] = "";
            }else{
                header("location: index1.php");
            }
        }else{
            echo "<script>alert('Woops!! Something wrong went.')</script>";
        }
     }else{
         echo "<script>alert('Password not watched.')</script>";
     }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription & Connexion</title>
</head>
<body>
<h2>Technology_Box</h2><br>
<section>
    <div class="FormInscrs">  
        <div class="form-text">Incription</div>
        <div class="form-saisie">
            <form action="" method="POST">
            <span><p>First Name</p></span> <input type="text" name="Firstname" value="<?php echo $Firstname; ?>">
            <span> <p>Last Name </p></span> <input type="text" name="Lastname" value="<?php echo $Lastname; ?>">
            <span><p> Email </p></span> <input type="mail" name="Email" value="<?php echo  $Email; ?>">
            <span><p> <p>Address<p></span> <input type="text" name="Address" value="<?php echo $Address; ?>">
            <span><p> Password</p> </span> <input type="password" name="Password" value="<?php echo  $_POST['Password']; ?>">
            <span><p>Confirm Password</p> </span> <input type="password" name="Confirmpassword" value="<?php echo $_POST['Confirmpassword']; ?>">
            <input type="submit" value="S'inscrire" name="submit" class="btnInscris">
           <p>Vous êtes déjà inscris?&nbsp;<a href="connexion.php">Connectez-Vous</a></p>
            </form>
        </div>
    </div>
</section>
</body>
</html>