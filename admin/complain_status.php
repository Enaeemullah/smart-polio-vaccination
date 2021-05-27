<?php include("includes/header.php"); ?>
<?php include("includes/functions.php"); ?>
<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    
    

              
        $sql = "UPDATE complain SET status = 'Action Taken' WHERE id = '{$id}' ";
        
        $update_result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        
        if($update_result)
        {
            $_SESSION['info'] =  "status is successfully updated.";
            
            header("Location: view_complains.php");
            exit();
        }
        else
        {
           $_SESSION['info'] =  "There was an error processing your request";
           header("Location: view_complains.php");
           exit();
        }

}
?>
 <?php include("includes/footer.php"); ?>