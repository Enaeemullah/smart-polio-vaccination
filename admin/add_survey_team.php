<?php include("includes/header.php"); ?>
 

 
 <?php 

if(isset($_GET['er']) && !empty($_GET['er']) && $_GET['er']==1)
{
    $name = $_SESSION['survey-data']['name'];
    $cnic = $_SESSION['survey-data']['cnic'];
    $city = $_SESSION['survey-data']['city'];
    $address = $_SESSION['survey-data']['address'];
    $contact_number = $_SESSION['survey-data']['contact_number'];
    $password = $_SESSION['survey-data']['password'];
}




    if(isset($_POST['add_survey_team']))
    {
        
         $_SESSION['survey-data']= $_POST;
         $name=$_POST['name'];
         $cnic = $_POST['cnic'];
         $city = $_POST['city'];
         $address = $_POST['address'];
         $contact_number = $_POST['contact_number'];
         $password = $_POST['password'];

        if(empty($name)||empty($cnic)||empty($city) || empty($address) ||empty($contact_number) || empty($password))
        {
            $_SESSION['info'] = "Please Fill All The Fields";
            header("location:add_survey_team.php?er=1");
            exit();
        }
        
        else if(!preg_match('/^[a-zA-Z ]{3,20}$/', $name)) {
           $_SESSION['info'] = "Name can not contains number and should be 3 to 20 characters long";
            header("location:add_survey_team.php?er=1");
            exit();
        }

        else if(!preg_match('/^[0-9]{13,15}$/', $cnic)) {
            $_SESSION['info'] = "CNIC code can only contain numbers and should be 13 characters long";
            header("location:add_survey_team.php?er=1");
            exit();
        }

        else if(!preg_match('/^[a-zA-Z0-9 ]{3,256}$/', $address)) {
           $_SESSION['info'] = "Address Name can not contains number and should be 3 to 256 characters long";
            header("location:add_survey_team.php?er=1");
            exit();
        }

        else if(!preg_match('/^[0-9]{6,15}$/', $contact_number)) {
            $_SESSION['info'] = "Contact Number can only contain numbers and should be 5 to 10 characters long";
            header("location:add_survey_team.php?er=1");
            exit();
        }

        else if(!preg_match('/^[0-9]{6,15}$/', $password)) {
           $_SESSION['info'] = "Password can only contain numbers and alphabects and should be between 6 to 15 characters";
            header("location:add_survey_team.php?er=1");
            exit();
        }
        
        else
        {
            $query ="INSERT INTO teams (type_id,name,cnic,city_id,address,contact_number,password,role_id) VALUES ('2','$name','$cnic','$city','$address','$contact_number','$password','1')";
            
            $result = mysqli_query($connection ,$query);
            if($result)
            {
                $_SESSION['info'] = "Sucessfully Added Survey Team";
                header("location:view_survey_team.php");
                exit();
             }
            else
            {
                $_SESSION['info'] = "Failed".mysqli_error($connection );
                   header("location:add_survey_team.php");
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
        Register Survey Team
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
                        <label for="name">   
                          Name:
                        </label>&nbsp;<span class="text-danger">*</span>

                         <input type="text" name="name" id="" class="form-control" value="<?php if(isset($name)) echo $name; ?>">
   
                    </div>
                </div>
                   
            </div>
            
            
             <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="cnic">   
                          CNIC:
                        </label>&nbsp;<span class="text-danger">*</span>
                        
                        <input type="text" name="cnic" id="" class="form-control" value="<?php if(isset($cnic)) echo $cnic; ?>">

                    </div>
                </div>

                  
            </div>
            
            
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">   
                         City:
                        </label>&nbsp;<span class="text-danger">*</span>
    
                   <select name="city" id="" class="form-control" >
                           <?php
          $sql = "select * from cities";
          $result = mysqli_query($connection, $sql);
              if($result)
              {
                  if(mysqli_num_rows($result)>0)
                  {
                      while($row=mysqli_fetch_assoc($result))
                      {
                          $city_id = $row['city_id'];
                          $city_name = $row['city_name'];
                          
                          echo "<option value=$city_id>{$city_name}</option>";
                      }
                  }
              }
          else 
          {
             echo "request Failed" .mysqli_error($conn);
          }
          
          ?>
      
                        </select>
                        
                             
                                       
                    </div>
                </div>
               
                  
            </div>
            
            
            
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">   
                         Address:
                        </label>&nbsp;<span class="text-danger">*</span>
    <input type="text" name="address" id="" class="form-control" value="<?php if(isset($address)) echo $address; ?>">     
                    </div>
                </div>
           
                  
            </div>
            
            
            
            
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact_number">   
                         Contact Number:
                        </label>&nbsp;<span class="text-danger">*</span>
    <input type="text" name="contact_number" id="" class="form-control" value="<?php if(isset($contact_number)) echo $contact_number; ?>">  
                    </div>
                </div>
                       
            </div>
            
            
            
            
             <div class="row">

                        <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">   
                          Password:
                        </label>&nbsp;<span class="text-danger">*</span>
    <input type="text" name="password" id="" class="form-control" value="<?php if(isset($password)) echo $password; ?>">     
                    </div>
                </div>
            </div>
            
            
            

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="hvr">
             <input type="submit" name="add_survey_team" class="btn btn-primary" value="Add Survey Team">
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