<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <link rel="stylesheet" href="css/admin.css">
       <!----Main content section starts ----->
       <div class="main-content">
       <div class="wrapper">
       <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Add Admin</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                </div>
            </nav>
       </div>

    <?php 
       if(isset($_SESSION['add'])){
         echo $_SESSION['add']; //display the session
         unset($_SESSION['add']);//remove session manage
       }
    ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="In Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
//process the values
//check whether the submit button is clicked or not
   if(isset($_POST['submit']))
   {
    //button clicked
    //echo "Button Clicked";
    //get the data from form
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      //sql
      $sql = "INSERT INTO tbl_admin SET
      full_name = '$full_name',
      username = '$username',
      password = '$password'
      ";
      //Execute query and save data in database
      $res = mysqli_query($conn, $sql) or die(mysqli_connect_error());
      if($res == TRUE){
        //echo "Data Inserted";
        //create session
        $_SESSION['add'] =  "Admin added successfully";
        //page to manage admin
        header('location:'.SITEURL.'admin/manage-admin.php');
      }else{
        //echo "fails to insert data";
        $_SESSION['add'] =  "Admin added successfully";
        //page to add admin
        header('location:' .SITEURL.'admin/manage-admin.php');
      }
   }
   


?>