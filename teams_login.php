<?php include("includes/header.php"); ?>
<?php

if(isset($_POST['signin']))
{
    
    //$_SESSION['signin-data'] =$_POST;
        
    // Collect form data and store into variables

     $cnic = $_POST['cnic'];
     $password = $_POST['password'];
    
    //Data Entry Validation
    if(empty($cnic) || empty($password))
    {
        $_SESSION['info'] =  "Please fill all the fields.";
        header("location: teams_login.php?er=1");
        exit();
    }
    
   
     else if(strlen($password) < 3 || strlen($password) > 10)
    {
        $_SESSION['info'] =  "This password is incorrect.";
        header("location: teams_login.php?er=1");
        exit();
    }
    else if(strlen($cnic) < 3 || strlen($cnic) > 100)
    {
        $_SESSION['info'] =  "cnic is incorrect.";
        header("location: teams_login.php?er=1");
        exit();
    }
    else
    {

        $login_sql = "SELECT * FROM teams where cnic= '$cnic' and password = '$password'";
        $login_result = mysqli_query($connection, $login_sql) or die("Request Failed");

        if(mysqli_num_rows($login_result) == 1)
        {
            $row = mysqli_fetch_assoc($login_result);
     
            $_SESSION['city_id'] = $row['city_id'];
            $_SESSION['role_id'] = $row['role_id'];
            $_SESSION['cnic'] = $row['cnic'];
            $_SESSION['type_id'] = $row['type_id']; 
            $_SESSION['team_number'] = $row['team_number']; 
            $_SESSION['name'] = $row['name'];
            
            
          if(($row['type_id']) == "2")
            {
                
            if(($row['role_id']) == "1")
            {
                header("Location: survey team/index.php");
                exit();
            }
            
            else if(($row['role_id']) == "2")
            {
                header("Location: eradication team/index.php");
                exit();
            }
            
            else
            {
                header("Location: index.php");
                exit();
            }
            
            }
        }
        else
        {
             $_SESSION['info'] = "Cnic or Password is incorrect, Please enter correct login details";
                header("Location:teams_login.php");
                exit();
        } 
    }
}

?>










<div class="container">
    <div class="col-md-10 offset-md-1">
        <div class="contensst-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h2 class="text-center">
                   Team  Log  In
                </h2>
            </section>
            <!-- Main content -->
            <section class="content">
       <!--   -->
     <?php include("includes/info.php"); ?>

<!--   -->   <div class="row">
              
              <div class="form-group">
                  <a href="parents_login.php"><input type="submit" name="signin" class="btn btn-outline-success" value="Parents"></a>
                             
                            </div>
                            
              
               <div class="form-group">
                <a href="admin_login.php"><input type="submit" name="signin" class="btn btn-outline-success" value="Admin"></a>
                             
                            </div>
                            
                            <div class="form-group">
                <a href="teams_login.php"><input type="submit" name="signin" class="btn btn-outline-success" value="Team"></a>
                             
                            </div>
                           
                            
                            </div>
                            
                <div class="my-bdr">
                <form action="" method="post">
                    <div class="row">   
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                                <label for="user_name">
                                   CNIC:
                                </label>&nbsp;<span class="text-danger">*</span>
                                <input type="text" name="cnic" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">
                                    Password:
                                </label>&nbsp;<span class="text-danger">*</span>
                                <input type="password" name="password" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                                <input type="submit" name="signin" class="btn btn-outline-success" value="Login">
                             
                            </div>
                        </div>
                    </div>      
                </form>
           </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
</div>






<?php include("includes/footer.php"); ?>