<?php include("includes/header.php"); ?>
 
 
 <?php

        if(isset($_GET['id']) && !empty($_GET['id']) && empty($_GET['er']) && !isset($_GET['er']))
        {
            $city_id = $_GET['id'];
            

    $sql_load = "SELECT * FROM cities where city_id = $city_id";
    $data = mysqli_query($connection, $sql_load);

                if($data)
                {
                    if(mysqli_num_rows($data)==1)
                    {
                        
                      $row=mysqli_fetch_assoc($data);
                        
                      $city_name = $row['city_name'];
                      $postal_code = $row['postal_code'];
                      $province = $row['province'];
                        
                        
                    }
                    else
                    {
                   $_SESSION['info']= "No Records Found";
                        header("location:view_cities.php");
                        exit();
                    }
                }
                else
                {
                    die("Request Failed");
                }
              
            }

/*For error time loading data from session array to variables*/
if(isset($_GET['er']))
{
    $city_name = $_SESSION['city-data']['city_name'];
    $postal_code = $_SESSION['city-data']['postal_code'];
    $province = $_SESSION['city-data']['province'];
    
    
}

?>
 
 <?php 

    if(isset($_POST['update_city']))
    {  
           $_SESSION['city-data'] = $_POST;
        
            $city_name = $_POST['city_name'];
            $postal_code = $_POST['postal_code'];
            $province =$_POST['province'];
            
           
        

        
        if(empty($city_name)||empty($postal_code)||empty($province))
        {
         $_SESSION['info'] = "Please Fill All The Fields";
            header("location:edit_city.php?er=1");
            exit();
        }
        
        
        
        else if(!preg_match('/^[a-zA-Z ]{3,20}$/', $city_name)) {
           $_SESSION['info'] = "City Name can not contains number and should be 3 to 20 characters long";
            header("location:edit_city.php?er=1");
            exit();
        }

        else if(!preg_match('/^[0-9]{5,10}$/', $postal_code)) {
            $_SESSION['info'] = "Postal code can only contain numbers and should be 5 to 10 characters long";
            header("location:edit_city.php?er=1");
            exit();
        }

        else if(!preg_match('/^[a-zA-Z ]{3,20}$/', $province)) {
           $_SESSION['info'] = "Province Name can not contains number and should be 3 to 20 characters long";
            header("location:edit_city.php?er=1");
            exit();
        }
        
      
        else
        {
            $sql_update ="UPDATE cities SET city_name = '$city_name', postal_code = '$postal_code', province = '$province' WHERE city_id = '$city_id' ";
        
            $update_result = mysqli_query($connection,$sql_update);

            if($update_result)
            {
                
                 $_SESSION['info']  =  "City information is updated successfully.";
                    header("Location: view_city.php");
                    exit();
             }
            else
            {
                   $_SESSION['info'] =  "Failed".mysqli_error($connection);
                    header("Location: edit_city.php?er=1&id=$city_id");
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
       Edit City
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
                        <label for="city_name">   
                          City Name:
                        </label>&nbsp;<span class="text-danger">*</span>

                         <input type="text" name="city_name" id="" class="form-control" value="<?php if(isset($city_name)) echo $city_name; ?>">
   
                    </div>
                </div>
                   
            </div>
            
            
             <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="postal_code">   
                          Postal Code:
                        </label>&nbsp;<span class="text-danger">*</span>
                        
                        <input type="text" name="postal_code" id="" class="form-control" value="<?php if(isset($postal_code)) echo $postal_code; ?>">

                    </div>
                </div>

                  
            </div>
            
            
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="province">   
                         Province:
                        </label>&nbsp;<span class="text-danger">*</span>
    <input type="text" name="province" id="" class="form-control" value="<?php if(isset($province)) echo $province; ?>">     
                    </div>
                </div>
               
                  
            </div>
            
            
            


            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="hvr">
             <input type="submit" name="update_city" class="btn btn-primary" value="Update City">
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