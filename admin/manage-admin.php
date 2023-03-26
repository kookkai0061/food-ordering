<?php include('partials/menu.php'); ?>
    
<link rel="stylesheet" href="css/admin.css">
       <!----Main content section starts ----->
       <div class="main-content">
       <div class="wrapper">
       <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Manage Admin</h2>
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
            <br /><br />
            <?php 
               if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
               }
               if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
               }
               if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
               }
               if(isset($_SESSION['user-not-found'])){
                echo $_SESSION['user-not-found'];
                unset ($_SESSION['user-not-found']);
               }
               if(isset($_SESSION['pass-not-match'])){
                echo $_SESSION['pass-not-match'];
                unset ($_SESSION['pass-not-match']);
               }
               if(isset($_SESSION['change-password'])){
                echo $_SESSION['change-password'];
                unset ($_SESSION['change-password']);
               }
            ?>
            <br/><br/><br/>
            <!---button to add admin--->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br /><br /><br />
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                     <tr>
                         <th scope="col" width="50">S.N</th>
                         <th scope="col">Full Name</th>
                         <th scope="col">Username</th>
                         <th scope="col">Action</th>
                     </tr>
                 </thead>
                <?php 
                   $sql= "SELECT * FROM tbl_admin";
                   $res = mysqli_query($conn, $sql);
                   
                   if($res == TRUE){
                    $rows = mysqli_num_rows($res);

                    $sn = 1;
                    if($rows > 0){
                        //we have data in database
                        while($rows = mysqli_fetch_assoc($res))
                        {
                            //using whlie loop to get all the data from db
                            //add while

                            //get individual
                            $id = $rows['id'];
                            $full_name =$rows['full_name'];
                            $username =$rows['username'];
                            //display the values in our table
                            ?>
                              <tr>
                                  <td><?php echo $sn++; ?></td>
                                  <td><?php echo $full_name; ?></td>
                                  <td><?php echo $username; ?>y</td>
                                  <td>
                                    <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change</a>
                                  <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary"><i class="bi bi-pencil-square"></i>Update</a>
                                  <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class= "btn-danger"> <i class="bi bi-trash3-fill"></i>Delete</a>
                                  </td>
                              </tr>

                            <?php 
                        }
                    }else{
                        //we do not have data
                    }
                   }
                ?>
            </table>
            
        </div>
       </div>
       <!----Main content section ends ----->

<?php include('partials/footer.php') ?>