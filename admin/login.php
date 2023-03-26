<?php include('../config/constraints.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in </title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center"> Login</h1><br>

        <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-message'])){
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        
        ?>
        <br><br>
        <!--- login start here --->
        <form action="" method="POST" class="text-center">
            Username: 
            <input type="text" name="username" placeholder="Enter Username"><br/><br>
            Password: 
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit"value="login" class="btn-primary"><br>

        </form>
        <br/><br>
        <p class="text-center">Create by - <a href="www.koukkai.com">Team-10</a></p>
    </div>
    
</body>
</html>

<?php 
  //check
  if(isset($_POST['submit'])){
     $username = $_POST['username'];
     $password = $_POST['password'];
    
    //2.sql
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password ='$password'";

    //3.execute
    $res = mysqli_query($conn, $sql);

    //4. count rows to check
    $count = mysqli_num_rows($res);
    if($count==1){
       $_SESSION['login'] = "<div class='success'>Login Successfully</div>";
       $_SESSION['user'] = $username; // to check whether the user is logged
       header('location:'.SITEURL.'admin/');
     //   header('location:'.SITEURL.'admin/');



    }else{

       $_SESSION['login'] = "<div class='error'>Login fails</div>";
       $_SESSION['user'] = $username; // to check whether the user is logged
       header('location:'.SITEURL.'admin/login.php');
  }
}

?>