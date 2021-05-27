<?php 

    function Already_Exist($sql)
    {
     global  $connection;
        
        $exist = false;
        
        
        $sql_ans = mysqli_query($connection, $sql);
        
        if(mysqli_num_rows($sql_ans)>0)
        {
            $exist = true;
        }
        return $exist;
    }

function validate_input($input)
{
    $input = trim($input); // Remove White Spaces
    $input = htmlspecialchars($input); // Remove Special Characters
    $input = stripslashes($input); // Remove back/forward slashes
    
    return $input;
}

?>