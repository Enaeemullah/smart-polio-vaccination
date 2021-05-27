<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("../includes/db.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/info.php"); ?>
<?php

if(isset($_POST['add_child']))
{
    
    $_SESSION['children-data'] = $_POST;

foreach($_POST['name'] as $v =>$k)
{ 
    
    $name =   $_POST['name'][$v];      
    $b_form = $_POST['b_form'][$v];   
    $age =    $_POST['age'][$v];
    $gender = $_POST['gender'][$v];  
    $status = $_POST['status'][$v];  

    
    
    // Data Entry Validation
    if(empty($name)   || empty($b_form)  || empty($age)  || empty($gender)  || empty($status))
    {
        $_SESSION['info'] =  "Please fill all the fields.";
        $er = 1;
    }
    
   
    
     if(strlen($b_form) < 13)
    {
        $_SESSION['info'] =  "Form-B Number should be 13 characters long.";
        $er = 1;
    }
    else if(strlen($name) < 3 || strlen($name) > 255)
    {
        $_SESSION['info'] =  "name should be 3-255 characters long.";
         $er = 1;
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $_SESSION['info'] =  "Name can only contain alphabet and first letter should be capital.";
            $er = 1;
        }
    
    else if(strlen($age) < 1 || strlen($age) > 3)
    {
        $_SESSION['info'] =  "age should be 1-3 characters long.";
         $er = 1;
    }
    else if(!preg_match("/^[0-9]*$/",$age))
        {
            $_SESSION['info'] =  "Age can only contain Numbers.";
            $er = 1;
        }
    
    
    

    if(isset($er) && !empty($er) && $er==1)
    {   $frn= $_GET['frn'];
        $family= $_GET['family'];
        header("location:child_record.php?er=1&frn=$frn&family=$family");
        exit();
    }
    
    else
    {
       // Insert Code will be written here
            
        $query ="INSERT INTO children (b_form,family_number,name,age,gender,status,ref_id) VALUES ('$b_form','{$_GET['frn']}','$name','$age','$gender','$status','{$_SESSION['team_number']}')";


        $result = mysqli_query($connection, $query) or die("Request Failed");
        
        
    } 
    
}// End of The Loop
    

    $_SESSION['info'] = "Children Information is successfully saved in the system.";
    
header("location:view_new_task.php");
exit();
    
}




?>