<?php include("includes/header.php"); ?>
 

 
 <?php 

 
     
if(isset($_GET['er']) && !empty($_GET['er']) && $_GET['er']==1)
{
     $name =   $_SESSION['children-data']['name'];
     $b_form = $_SESSION['children-data']['b_form'];
     $age =    $_SESSION['children-data']['age'];
     $gender = $_SESSION['children-data']['gender'];
     $status = $_SESSION['children-data']['status'];
    
}

?>
 

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Register Children
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
  <?php
  if(isset($_GET['frn']) && !empty($_GET['frn']) && isset($_GET['family']) && !empty($_GET['family']))
    {
        
        $frn = $_GET['frn'];
        $members = $_GET['family'];
    ?>
  
  
   
<div class="row">
            
<form name="fmem" method="post" action="add_child_record.php?frn=<?php echo $frn;?>&family=<?php echo $members;?>" class="form-horizontal" >
            <label for="lesse_cnic">Family Registration Number
 <input type="text" name="lesse_cnic" id="lesse_cnic" value="<?php echo $frn;?>" class="form-control" readonly></label>
 <input type="hidden" name="family" id="family" value="<?php echo $_GET['family']; ?>" class="form-control" readonly>
        <table class="table table-bordered table-hover table-striped">
        	<tr>
            <th>Form-B Number</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Status</th>
            </tr>
            <?php
			for($a=1;$a<=$members;$a++)
		{
		?>
        	<tr>
            <td><input type="text" name="b_form[]" class="form-control" /></td>
            <td><input type="text" name="name[]" class="form-control" /></td>
            <td><input type="text" name="age[]" class="form-control" /></td>
                <td><select name="gender[]" required class="form-control">
            	<option value="Male">Male</option>
                   <option value="Female">Female</option>
                </select></td>
            <td><select name="status[]" required class="form-control">
            	<option value="vaccinated">Vaccinated</option>
                   <option value="nvaccinated">Not Vaccinated</option>
                </select></td>
               
                </tr>
               <?php
			   }
			   ?>
               <tr>
               	<td colspan="6">
               	<input type="submit" name="add_child" value="Add children" class="btn btn-primary">
 </td>
               </tr>
        </table>
        </form>
            

  
            </div>
   
   <?php } 
        
        ?>
   
   
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include("includes/footer.php"); ?>