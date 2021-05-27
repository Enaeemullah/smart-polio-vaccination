<?php include("includes/header.php"); ?>
  
<?php include("includes/sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Survey Teams Information
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
                  
                  <th class="text-white">Team Number</th>
                  <th class="text-white">Full Name</th>
                  <th class="text-white">CNIC</th>
                  <th class="text-white">Contact Number</th>
                  <th class="text-white">City</th>
                  <th class="text-white">Address</th>
                  <th class="text-white"  >Action</th>


                </tr>
                </thead>
                <tbody>
                 
                  <?php 
     $sql_load_district = "SELECT * FROM teams t join cities c where t.role_id='1' and t.city_id=c.city_id and t.type_id ='2'";
  $district_data = mysqli_query($connection, $sql_load_district);
                    
      if($district_data)
           {
         if(mysqli_num_rows($district_data)>0)
                        {
     while($row=mysqli_fetch_assoc($district_data))
                            {
         $team_number = $row['team_number'];
        $name = $row['name'];
        $cnic = $row['cnic'];
        $city = $row['city_name'];
        $address = $row['address'];
        $contact_number = $row['contact_number'];


       
                            ?>
                                <tr>
                        <td><?php echo $team_number; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $cnic; ?></td>
                        <td><?php echo $contact_number; ?></td>
                         <td><?php echo $city; ?></td>
                         <td><?php echo $address; ?></td>
                         
                       <td><a href="edit_survey_team.php?id=<?php echo $team_number; ?>"><input type="button" class="btn btn-info" value="Edit" > </a></td>
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