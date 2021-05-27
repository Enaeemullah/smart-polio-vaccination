<?php include("includes/header.php"); ?>
 

 
 <?php 

  if(isset($_GET['er']) && !empty($_GET['er']) && $_GET['er']==1)
{
     $father_cnic=     $_SESSION['record-data']['father_cnic'];
     $mother_cnic =    $_SESSION['record-data']['mother_cnic'];
     $father_name =    $_SESSION['record-data']['father_name'];
     $mother_name =    $_SESSION['record-data']['mother_name'];
     $family_number =  $_SESSION['record-data']['family_number'];
     $no_of_children = $_SESSION['record-data']['no_of_children'];
     $full_address =   $_SESSION['record-data']['full_address'];
}



    if(isset($_POST['add_new_record']))
    {
        
         $_SESSION['record-data']= $_POST;
         $father_cnic=     $_POST['father_cnic'];
         $mother_cnic =    $_POST['mother_cnic'];
         $father_name =    $_POST['father_name'];
         $mother_name =    $_POST['mother_name'];
         $family_number =  $_POST['family_number'];
         $no_of_children = $_POST['no_of_children'];
         $full_address =   $_POST['full_address'];


        if(empty($father_cnic)||empty($mother_cnic)||empty($father_name) || empty($mother_name) ||empty($family_number) || empty($no_of_children) || empty($full_address))
        {
            $_SESSION['info'] = "Please Fill All The Fields";
            header("location:add_record.php?er=1");
            exit();
        }
        
        
         else if(!preg_match('/^[0-9]{13,15}$/', $father_cnic)) {
           $_SESSION['info'] = "Father CNIC can only contain numbers and should be 13 characters long";
            header("location:add_record.php?er=1");
            exit();
        }

        else if(!preg_match('/^[0-9]{13,15}$/', $mother_cnic)) {
            $_SESSION['info'] = "Mother CNIC can only contain numbers and should be 13 characters long";
            header("location:add_record.php?er=1");
            exit();
        }

        else if(!preg_match('/^[a-zA-Z ]{3,20}$/', $father_name)) {
           $_SESSION['info'] = "Father Name can only contains Alphabects and should be 3 to 20 characters long";
            header("location:add_record.php?er=1");
            exit();
        }

        else if(!preg_match('/^[a-zA-Z ]{3,20}$/', $mother_name)) {
            $_SESSION['info'] = "Mother Name can only contains Alphabects and should be 3 to 20 characters long";
            header("location:add_record.php?er=1");
            exit();
        }

        else if(!preg_match('/^[0-9]{6,15}$/', $family_number)) {
           $_SESSION['info'] = "Family Number can only contain numbers and should be between 6 to 15 characters";
            header("location:add_record.php?er=1");
            exit();
        }
        
        else if(!preg_match('/^[a-zA-Z0-9 ]{3,256}$/', $full_address)) {
           $_SESSION['info'] = "Address can only contain Alphabect numbers and should be between 6 to 15 characters";
            header("location:add_record.php?er=1");
            exit();
        }
        
        
        
        else
        {
            $query ="INSERT INTO parents (type_id,father_cnic,mother_cnic, father_name,mother_name,family_number,no_of_children,city_id,full_address,password,status,ref_id) VALUES ('3','$father_cnic','$mother_cnic','$father_name','$mother_name','$family_number','$no_of_children','{$_SESSION['city_id']}','$full_address','Null','pending','{$_SESSION['team_number']}')";
            
            $result = mysqli_query($connection ,$query);
            if($result)
            {
                $_SESSION['info'] = "Sucessfully Added Record";
                header("location:view_record.php");
                exit();
             }
            else
            {
                $_SESSION['info'] = "Failed".mysqli_error($connection );
                   header("location:add_record.php");
            exit();
            }
        }
}
?>
             
 <?php


?>
 

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Register New Records
               
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
                        <label for="family_number">   
                         Family Number:
                        </label>&nbsp;<span class="text-danger">*</span>
    <input type="text" name="family_number" id="" class="form-control" value="<?php if(isset($family_number)) echo $family_number; ?>">  
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
             <input type="submit" name="add_new_record" class="btn btn-primary" value="Add New Record">
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