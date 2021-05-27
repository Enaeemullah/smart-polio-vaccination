<?php include("includes/header.php"); ?>
 
 
 <?php
      /*For error time loading data from session array to variables*/
if(isset($_GET['er']))
{
    
     $father_cnic=     $_SESSION['parents-data']['father_cnic'];
     $mother_cnic =    $_SESSION['parents-data']['mother_cnic'];
     $father_name =    $_SESSION['parents-data']['father_name'];
     $mother_name =    $_SESSION['parents-data']['mother_name'];
     $no_of_children = $_SESSION['parents-data']['no_of_children'];
     $full_address =   $_SESSION['parents-data']['full_address'];
   
    
}


        else if(isset($_GET['frn']) && !empty($_GET['frn']) && empty($_GET['er']) && !isset($_GET['er']))
        {
            $family_number = $_GET['frn'];
            

    $sql_load = "SELECT * FROM parents where family_number = $family_number";
    $data = mysqli_query($connection, $sql_load);

                if($data)
                {
                    if(mysqli_num_rows($data)==1)
                    {
                        
                      $row=mysqli_fetch_assoc($data);

                        $father_name = $row['father_name'];
                        $father_cnic = $row['father_cnic'];
                        $mother_name = $row['mother_name'];
                        $mother_cnic = $row['mother_cnic'];
                        $no_of_children = $row['no_of_children'];
                        $full_address = $row['full_address'];
                        
                    }
                    else
                    {
                   $_SESSION['info']= "No Records Found";
                        header("location:view_parents.php");
                        exit();
                    }
                }
                else
                {
                    die("Request Failed");
                }
              
            }



?>
 
 <?php 

    if(isset($_POST['update_parents']))
    {
        $_SESSION['parents-data'] = $_POST;
           

         $father_cnic=     $_POST['father_cnic'];
         $mother_cnic =    $_POST['mother_cnic'];
         $father_name =    $_POST['father_name'];
         $mother_name =    $_POST['mother_name'];
         $no_of_children = $_POST['no_of_children'];
         $full_address =   $_POST['full_address'];
        

        
   if(empty($father_cnic)||empty($mother_cnic)||empty($father_name) || empty($mother_name) ||empty($no_of_children) || empty($full_address))
        {
            $_SESSION['info'] = "Please Fill All The Fields";
            header("location:edit_parents.php?er=1");
            exit();
        }
        
        
         else if(!preg_match('/^[0-9]{13,15}$/', $father_cnic)) {
           $_SESSION['info'] = "Father CNIC can only contain numbers and should be 13 characters long";
            header("location:edit_parents.php?er=1");
            exit();
        }

        else if(!preg_match('/^[0-9]{13,15}$/', $mother_cnic)) {
            $_SESSION['info'] = "Mother CNIC can only contain numbers and should be 13 characters long";
            header("location:edit_parents.php?er=1");
            exit();
        }

        else if(!preg_match('/^[a-zA-Z ]{3,20}$/', $father_name)) {
           $_SESSION['info'] = "Father Name can only contains Alphabects and should be 3 to 20 characters long";
            header("location:edit_parents.php?er=1");
            exit();
        }

        else if(!preg_match('/^[a-zA-Z ]{3,20}$/', $mother_name)) {
            $_SESSION['info'] = "Mother Name can only contains Alphabects and should be 3 to 20 characters long";
            header("location:edit_parents.php?er=1");
            exit();
        }

        else if(!preg_match('/^[a-zA-Z0-9 ]{3,256}$/', $full_address)) {
           $_SESSION['info'] = "Address can only contain Alphabect numbers and should be between 6 to 15 characters";
            header("location:edit_parents.php?er=1");
            exit();
        }
        
      
        else
        {
            $sql_update ="UPDATE parents SET father_cnic = '$father_cnic', mother_cnic = '$mother_cnic', father_name = '$father_name', mother_name ='$mother_name', no_of_children='$no_of_children', full_address = '$full_address' WHERE family_number = '$family_number' ";
        
            $update_result = mysqli_query($connection,$sql_update);

            if($update_result)
            {
                
                 $_SESSION['info']  =  "Parents information is updated successfully.";
                    header("Location: view_parents.php");
                    exit();
             }
            else
            {
                   $_SESSION['info'] =  "Failed".mysqli_error($connection);
                    header("Location: edit_parents.php?er=1&frn=$family_number");
                    exit();
            }
        }
    }

?>
           
 
 

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Parents Record
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
 <form action="" method="post">
             <div class="row">
                        <div class="col-md-6">
                    <div class="form-group">
                        <label for="father_cnic">
                          Father CNIC:
                        </label>&nbsp;<span class="text-danger">*</span>

                         <input type="text" name="father_cnic" id="" class="form-control" value="<?php if(isset($father_cnic)) echo $father_cnic; ?>">
   
                    </div>
                </div>
                   
            </div>
            
            
             <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="mother_cnic">   
                          Mother CNIC:
                        </label>&nbsp;<span class="text-danger">*</span>
                        
                        <input type="text" name="mother_cnic" id="" class="form-control" value="<?php if(isset($mother_cnic)) echo $mother_cnic; ?>">

                    </div>
                </div>

                  
            </div>
            
            
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="father_name">   
                         Father Name:
                        </label>&nbsp;<span class="text-danger">*</span>
    <input type="text" name="father_name" id="" class="form-control" value="<?php if(isset($father_name)) echo $father_name; ?>">     
                    </div>
                </div>
               
                  
            </div>
            
            
            
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mother_name">   
                         Mother Name:
                        </label>&nbsp;<span class="text-danger">*</span>
    <input type="text" name="mother_name" id="" class="form-control" value="<?php if(isset($mother_name)) echo $mother_name; ?>">     
                    </div>
                </div>
           
                  
            </div>
            
            
            
            
             <div class="row">

                        <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_of_children">   
                          No of Children:
                        </label>&nbsp;<span class="text-danger">*</span>
    <input type="text" name="no_of_children" id="" class="form-control" value="<?php if(isset($no_of_children)) echo $no_of_children; ?>">     
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            <div class="row">

                        <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">   
                          Full Address:
                        </label>&nbsp;<span class="text-danger">*</span>
    <input type="text" name="full_address" id="" class="form-control" value="<?php if(isset($full_address)) echo $full_address; ?>">     
                    </div>
                </div>
            </div>
            
            
            

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="hvr">
             <input type="submit" name="update_parents" class="btn btn-primary" value="Update Parents">
                        </div>
                    </div>
                </div>


            </div>
        </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include("includes/footer.php"); ?>