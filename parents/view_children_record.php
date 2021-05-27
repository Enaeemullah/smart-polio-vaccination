
<?php include("includes/header.php"); ?>
  
<?php include("includes/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Children Vaccination Record
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
                  
                  <th class="text-white">Form-B Number</th>
                  <th class="text-white">Name</th>
                  <th class="text-white">Age</th>
                  <th class="text-white">Gender</th>
                  <th class="text-white">Status</th>

                </tr>
                </thead>
                <tbody>
                 
                  <?php 
     $sql = "SELECT * FROM children where family_number = '{$_SESSION['family_number']}'";
  $data = mysqli_query($connection, $sql);
                    
      if($data)
           {
         if(mysqli_num_rows($data)>0)
                        {
     while($row=mysqli_fetch_assoc($data))
                            {
        $b_form = $row['b_form'];
        $name = $row['name'];
        $age = $row['age'];
        $Gender = $row['gender'];
        $status = $row['status'];
        

       
                            ?>
                                <tr>
                        <td><?php echo $b_form; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $age; ?></td>
                         <td><?php echo $Gender; ?></td>
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