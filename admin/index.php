<?php include('partials/menu.php'); ?>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                    <?php 
				//Sql Query 
				$sql = "SELECT * FROM tbl_food";
				//Execute Query
				$res = mysqli_query($conn, $sql);
				//Count Rows
				$count = mysqli_num_rows($res);
			?>
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $count; ?></h3>
                                <p class="fs-5">Category</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                    <?php 
				//Sql Query 
				$sql2 = "SELECT * FROM tbl_food";
				//Execute Query
				$res2 = mysqli_query($conn, $sql2);
				//Count Rows
				$count2 = mysqli_num_rows($res2);
			?>
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $count2; ?></h3>
                                <p class="fs-5">Foods</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                
                        </div>
                    </div>

                    <div class="col-md-3">
                    <?php 
				//Sql Query 
				$sql3 = "SELECT * FROM tbl_order";
				//Execute Query
				$res3 = mysqli_query($conn, $sql3);
				//Count Rows
				$count3 = mysqli_num_rows($res3);
			?>
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $count3; ?></h3>
                                <p class="fs-5">Total</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        
                        </div>
                    </div>

                    <div class="col-md-3">
                    <?php 
				//Creat SQL Query to Get Total Revenue Generated
				//Aggregate Function in SQL
				$sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

				//Execute the Query
				$res4 = mysqli_query($conn, $sql4);

				//Get the VAlue
				$row4 = mysqli_fetch_assoc($res4);
				
				//GEt the Total REvenue
				$total_revenue = $row4['Total'];

			?>
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $total_revenue; ?>K</h3>
                                <p class="fs-5">Revenue</p>
                            </div>
                            <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <?php include('partials/footer.php') ?>