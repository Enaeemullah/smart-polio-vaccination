<?php include("includes/header.php"); ?>
 

 
 <?php 

 
     
if(isset($_GET['er']) && !empty($_GET['er']) && $_GET['er']==1)
{
     $name =   $_SESSION['children-data']['name'];
     $b_form = $_SESSION['children-data']['b_form'];
     $age =    $_SESSION['children-data']['age'];
     $gender = $_SESSION['children-data']['gender'];
     $status = $_SESSION['children-data']['status'];
    
}

?>
 

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Register Children
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  <!--   -->
     <?php include("../includes/info.php"); ?>

<!--   -->
  <?php
  if(isset($_GET['frn']) && !empty($_GET['frn']) && isset($_GET['family']) && !empty($_GET['family']))
    {
        
        $frn = $_GET['frn'];
        $members = $_GET['family'];
    ?>
  
  
   
<div class="row">
            
<div  class="form-horizontal" >
            <label for="frn">Family Registration Number
 <input type="text" name="frn" id="frn" value="<?php echo $frn;?>" class="form-control" readonly></label>
          
    <a href="child_record.php?frn=<?php echo $frn;?>&family=<?php echo $members;?>"><input type="submit" name="add_child" value="Add children" class="btn btn-primary" ></a>

        </div>



            </div>
   
   <?php } 
        
        ?>
        
        
        
        
        
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
     $sql = "SELECT * FROM children where family_number = '$frn'";
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
        
        
        
        
        
        
        
        
        
   
   
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include("includes/footer.php"); ?>