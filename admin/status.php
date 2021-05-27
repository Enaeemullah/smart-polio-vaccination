<?php include("includes/header.php"); ?>
<?php include("includes/functions.php"); ?>
<?php

if(isset($_GET['family_number']))
{
    $family_number = $_GET['family_number'];
    
    

              
        $sql = "UPDATE parents SET status = 'approved', password ='123456' WHERE family_number = '{$family_number}' ";
        
        $update_result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        
        if($update_result)
        {
            $_SESSION['info'] =  "status is successfully updated, Defult Password set as 123456";
            
            header("Location: new_survey.php");
            exit();
        }
        else
        {
           $_SESSION['info'] =  "There was an error processing your request";
           header("Location: new_survey.php");
           exit();
        }

}
?>
 <?php include("includes/footer.php"); ?>