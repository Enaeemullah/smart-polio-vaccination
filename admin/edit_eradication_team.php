<?php include("includes/header.php"); ?>
 
 
 <?php
      /*For error time loading data from session array to variables*/
if(isset($_GET['er']))
{
    
    $name = $_SESSION['eradication-data']['name'];
    $cnic = $_SESSION['eradication-data']['cnic'];
    $city = $_SESSION['eradication-data']['city'];
    $address = $_SESSION['eradication-data']['address'];
    $contact_number = $_SESSION['eradication-data']['contact_number'];
    
}


        else if(isset($_GET['id']) && !empty($_GET['id']) && empty($_GET['er']) && !isset($_GET['er']))
        {
            $team_number = $_GET['id'];
            

    $sql_load = "SELECT * FROM teams where team_number = $team_number";
    $data = mysqli_query($connection, $sql_load);

                if($data)
                {
                    if(mysqli_num_rows($data)==1)
                    {
                        
                      $row=mysqli_fetch_assoc($data);
                  
                        $name=            $row['name'];
                        $cnic =           $row['cnic'];
                        $city =           $row['city_id'];
                        $address =        $row['address'];
                        $contact_number = $row['contact_number'];
                        
                        
                    }
                    else
                    {
                   $_SESSION['info']= "No Records Found";
                        header("location:view_survey_team.php");
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

    if(isset($_POST['update_survey_team']))
    {
        $_SESSION['eradication-data'] = $_POST;
           
            $name=$_POST['name'];
            $cnic = $_POST['cnic'];
            $city = $_POST['city'];
            $address = $_POST['address'];
            $contact_number = $_POST['contact_number'];
            
           
        

        
   if(empty($name)||empty($cnic)||empty($city)||empty($address)||empty($contact_number))
        {
         $_SESSION['info'] = "Please Fill All The Fields";
            header("location:edit_eradication_team.php?er=1&id=$team_number");
            exit();
        }
        
        
        
        else if(!preg_match('/^[a-zA-Z ]{3,20}$/', $name)) {
           $_SESSION['info'] = "Name can not contains number and should be 3 to 20 characters long";
            header("location:edit_eradication_team.php?er=1");
            exit();
        }

        else if(!preg_match('/^[0-9]{13,15}$/', $cnic)) {
            $_SESSION['info'] = "CNIC can only contain numbers and should be 13 characters long";
            header("location:edit_eradication_team.php?er=1");
            exit();
        }

        else if(!preg_match('/^[a-zA-Z0-9 ]{5,256}$/', $address)) {
           $_SESSION['info'] = "Address can only contains number, alphabects and should be 5 to 256 characters long";
            header("location:edit_eradication_team.php?er=1");
            exit();
        }
        
        else if(!preg_match('/^[0-9]{6,13}$/', $contact_number)) {
           $_SESSION['info'] = "Contact Number can only contains numbers and should be 6 to 13 characters long";
            header("location:edit_eradication_team.php?er=1");
            exit();
        }
        
      
        else
        {
            $sql_update ="UPDATE teams SET name = '$name', cnic = '$cnic', city_id = '$city', address = '$address', contact_number='$contact_number' WHERE team_number = '$team_number' ";
        
            $update_result = mysqli_query($connection,$sql_update);

            if($update_result)
            {
                
                 $_SESSION['info']  =  "Eradication Team information is updated successfully.";
                    header("Location: view_eradication_team.php");
                    exit();
             }
            else
            {
                   $_SESSION['info'] =  "Failed".mysqli_error($connection);
                    header("Location: edit_eradication_team.php?er=1&id=$team_number");
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
       Edit Eradication Team Members
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
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="hvr">
             <input type="submit" name="update_survey_team" class="btn btn-primary" value="Update Eradication Team">
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