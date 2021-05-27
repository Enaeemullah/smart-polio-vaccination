<?php include("includes/header.php"); ?>
  
<?php include("includes/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Cities Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
    <div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
              <?php include("../includes/info.php"); ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive table-hover">
                <thead>
                <tr>
                  
                  <th class="text-white">City Name</th>
                  <th class="text-white">Postal Code</th>
                  <th class="text-white">Province</th>
                  <th class="text-white">Action</th>
            
                </tr>
                </thead>
                <tbody>
                 
                  <?php 
     $sql_load = "SELECT * FROM cities";
  $city_data = mysqli_query($connection, $sql_load);
                    
      if($city_data)
           {
         if(mysqli_num_rows($city_data)>0)
                        {
     while($row=mysqli_fetch_assoc($city_data))
                            {
        $city_id = $row['city_id'];
        $city_name = $row['city_name'];
        $postal_code = $row['postal_code'];
        $province = $row['province'];
        
                            ?>
                                <tr>
                        <td><?php echo $city_name; ?></td>
                        <td><?php echo $postal_code; ?></td>
                        <td><?php echo $province; ?></td>
                        <td><a href="edit_city.php?id=<?php echo $city_id ?>"><input type="button" class="btn btn-info" value="Edit" > </a></td>
                      

                                </tr>
                                <?php
                                
                            }
                                
                        }

                    }

              
                    ?>
                  </tbody>
                
               
       
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include("includes/footer.php"); ?>