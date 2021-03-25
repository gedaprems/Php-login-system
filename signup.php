<!--INSERT INTO `users` (`sno`, `username`, `password`, `dt`) VALUES (NULL, 'prems', 'prems', current_timestamp());-->


<?php
    $inserted = false;
    $passnotmatch = false;
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username= $_POST['username'];
    $password= $_POST['password'];
    $cpassword= $_POST['cpassword'];
    

    $existssql = "SELECT * FROM `users` where username = '$username'";
    $result = mysqli_query($conn , $existssql);
    $numexistrows = mysqli_num_rows($result);
    if($numexistrows){
        $passnotmatch = "Username is already exits.";

    }else{
        if(($password == $cpassword)){  
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);      
            $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ( '$username', '$hashpassword', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $inserted = true;
            }
            }else{
                $passnotmatch = "Password Not Match.";
            }
    
    }
}
    

    

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
    <?php 

    require 'partials/_navbar.php';
    
    ?>

    <?php 

    if($inserted){
   
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account is now created and you can login.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    ?>
    <?php 

    if($passnotmatch){

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong> '.$passnotmatch.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }
    ?>


    

    
    
    <div class="container my-4">

            <h2 class="text-center">Sign Up to use our site.</h2>

            <form  action="/php_login/signup.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="emailHelp" class="form-text text-muted">Make sure the password should be same.</small>
            </div>          
            <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
    
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>