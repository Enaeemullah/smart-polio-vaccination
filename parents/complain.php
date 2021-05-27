<?php include("includes/header.php"); ?>
 

 
 <?php 

    if(isset($_POST['add_complain']))
    {
        
         $_SESSION['complain-data']= $_POST;
        
         $subject=$_POST['subject'];
         $description = $_POST['description'];


        if(empty($subject)||empty(description))
        {
            $_SESSION['info'] = "Please Fill All The Fields";
            header("location:add_cities.php?er=1");
            exit();
        }
        
        else
        {
            $query ="INSERT INTO complain (family_number,subject,description,status) VALUES ('{$_SESSION['family_number']}','$subject','$description','pending')";
            
            $result = mysqli_query($connection ,$query);
            if($result)
            {
                $_SESSION['info'] = "your complain is registered Sucessfully";
                header("location:complain.php");
                exit();
             }
            else
            {
                $_SESSION['info'] = "Failed".mysqli_error($connection );
                   header("location:complain.php");
            exit();
            }
        }
}
?>
             
 <?php
if(isset($_GET['er']) && !empty($_GET['er']) && $_GET['er']==1)
{
    $subject = $_SESSION['complain-data']['subject'];
    $description = $_SESSION['complain-data']['description'];
    
}

?>
 

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Register Your Complain 
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
                        <label for="subject">   
                          Subject:
                        </label>&nbsp;<span class="text-danger">*</span>

                         <input type="text" name="subject" id="" class="form-control" value="<?php if(isset($subject)) echo $subject; ?>">
   
                    </div>
                </div>
                   
            </div>
            
            
             <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">   
                          Description:
                        </label>&nbsp;<span class="text-danger">*</span>
                        
                        <input type="text" name="description" id="" class="form-control" value="<?php if(isset($description)) echo $description; ?>">

                    </div>
                </div>

                  
            </div>
            
           


            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="hvr">
             <input type="submit" name="add_complain" class="btn btn-primary" value="Add Complain">
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