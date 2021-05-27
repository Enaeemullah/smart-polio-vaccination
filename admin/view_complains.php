<?php include("includes/header.php"); ?>
  
<?php include("includes/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Registered Complains
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
                  
                  <th class="text-white">Complain ID</th>
                  <th class="text-white">Subject</th>
                  <th class="text-white">Description</th>
                  <th class="text-white">Status</th>
                  <th class="text-white">Take Action</th>
            
                </tr>
                </thead>
                <tbody>
                 
                  <?php 
     $sql_load = "SELECT * FROM complain";
      $data = mysqli_query($connection, $sql_load);
                    
      if($data)
           {
         if(mysqli_num_rows($data)>0)
                        {
     while($row=mysqli_fetch_assoc($data))
                            {
        $id = $row['id'];
        $subject = $row['subject'];
        $description = $row['description'];
        $status = $row['status'];
        
                            ?>
                                <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $subject; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $status; ?></td>
                      
                                
                         <td>
              <?php 
                    if($status=='pending')
                    { ?>
                        <a href="complain_status.php?id=<?php echo $id; ?>">Approve</a>
                    <?php
                    
                    }
                    
                 ?>
                 
                  <?php 
              

              
              
              
              ?>
              
              
              
              
          </td>
                                
                                                

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