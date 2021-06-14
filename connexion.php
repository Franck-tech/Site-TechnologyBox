<?php
 $connect = mysqli_connect("localhost:3308", "root", "","technologybox");

  session_start();

   error_reporting(0);

 if(isset($_POST['submit'])){
    $Email = $_POST['Email'];
    $Password = md5($_POST['Password']);

    $sql = "SELECT * FROM inscription WHERE Email='$Email' AND Password ='$Password'";
    $result = mysqli_query($connect,$sql);
    if($result->num_rows > 0){
       $row = mysqli_fetch_assoc($result);
       $_SESSION['FirstName'] = $row['FirstName'];
       header("location: mycart.php");
    }else{
          echo "<script>alert('Woops!! Email or password is wrong.')</script>";
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
<body1>
<h2>Technology_Box</h2><br>
    <div class="Formconnexion">  
        <div class="form-text1">Connexion</div>
        <div class="form-saisie1">
            <form action="" method="POST">
            <span><p> Email </p></span> <input type="mail" name="Email" value="<?php echo  $Email; ?>" require>
            <span><p> Password</p> </span> <input type="password" name="Password" value="<?php echo  $_POST['Password']; ?>" require>
            <input type="submit" value="SeConnecter" name="submit" class="btnInscris">
           <p>Vous n'êtes pas encore inscris?&nbsp;<a href="inscription.php">Inscrivez-Vous</a></p>
            </form>
        </div>
    </div>
</body1>
</html>