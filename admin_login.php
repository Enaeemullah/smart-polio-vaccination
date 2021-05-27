<?php include("includes/header.php"); ?>
<?php

if(isset($_POST['signin']))
{
    
    //$_SESSION['signin-data'] =$_POST;
        
    // Collect form data and store into variables

     $id = $_POST['id'];
     $password = $_POST['password'];
    
    //Data Entry Validation
    if(empty($id) || empty($password))
    {
        $_SESSION['info'] =  "Please fill all the fields.";
        header("location: admin_login.php?er=1");
        exit();
    }

     else if(strlen($password) < 3 || strlen($password) > 10)
    {
        $_SESSION['info'] =  "This password is incorrect.";
        header("location: admin_login.php?er=1");
        exit();
    }
    else if(strlen($id) < 3 || strlen($id) > 100)
    {
        $_SESSION['info'] =  "ID is incorrect.";
        header("location: admin_login.php?er=1");
        exit();
    }
    else
    {

        $login_sql = "SELECT * FROM admin where user_name = '$id' and password = '$password'";
        $login_result = mysqli_query($connection, $login_sql) or die("Request Failed");

        if(mysqli_num_rows($login_result) == 1)
        {
            $row = mysqli_fetch_assoc($login_result);
     
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['type_id'] = $row['type_id'];
            
            if(($row['type_id']) == "1")
            {
                header("Location: admin/index.php");
                exit();
            }
            
            else
            {
                header("Location: index.php");
                exit();
            }
        }
        else
        {
             $_SESSION['info'] = "ID or Password is incorrect, Please enter correct login details";
                header("Location:admin_login.php");
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
                    Admin  Log  In
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
                                   ID:
                                </label>&nbsp;<span class="text-danger">*</span>
                                <input type="text" name="id" id="" class="form-control">
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