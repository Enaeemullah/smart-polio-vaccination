<?php include("includes/header.php"); ?>
  
<?php include("includes/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Parents Information
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
                  
                  <th class="text-white">Father Name</th>
                  <th class="text-white">Father CNIC</th>
                  <th class="text-white">Mother Name</th>
                  <th class="text-white">Mother CNIC</th>
                  <th class="text-white">Family Number</th>
                  <th class="text-white">Childern</th>
                  <th class="text-white">Address</th>
                  <th class="text-white">Status</th>

                </tr>
                </thead>
                <tbody>
                 
                  <?php 
     $sql_load_district = "SELECT * FROM parents where ref_id = '{$_SESSION['team_number']}'";
  $district_data = mysqli_query($connection, $sql_load_district);
                    
      if($district_data)
           {
         if(mysqli_num_rows($district_data)>0)
                        {
     while($row=mysqli_fetch_assoc($district_data))
                            {
        $father_cnic = $row['father_cnic'];
        $mother_cnic = $row['mother_cnic'];
        $father_name = $row['father_name'];
        $mother_name = $row['mother_name'];
        $family_number = $row['family_number'];
        $no_of_children = $row['no_of_children'];
        $full_address = $row['full_address'];
        $status = $row['status'];
        

       
                            ?>
                                <tr>
                        <td><?php echo $father_cnic; ?></td>
                        <td><?php echo $father_name; ?></td>
                        <td><?php echo $mother_cnic; ?></td>
                         <td><?php echo $mother_name; ?></td>
                         <td><?php echo $family_number; ?></td>
                         <td><?php echo $no_of_children; ?></td>
                         <td><?php echo $full_address; ?></td>
                         <td><?php echo $status; ?></td>
                         
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