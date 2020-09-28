<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	

	$employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);	
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
    $join_date = mysqli_real_escape_string($conn, $_POST['join_date']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $basic_pay = mysqli_real_escape_string($conn, $_POST['basic_pay']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['zip']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
	// checking empty fields
	if(empty($name) || empty($gender) || empty($email) || empty($website) || empty($city) || empty($birth_date) || empty($join_date) || empty($department) || empty($basic_pay) || empty($zip_code) || empty($address) || empty($employee_id)) {	
			
		
			echo "<font color='red'>field is empty.</font><br/>";
	
			
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE employee SET name='$name',gender='$gender',email='$email',birth_date='$birth_date',website='$website',employee_id='$employee_id',department='$department',postal_code='$zip_code'
        ,address='$address',join_date='$join_date',birth_date='$birth_date',annual_basic_pay='$basic_pay' WHERE employee_id=$employee_id");
		
		//redirectig to the display page. In our case, it is 
		header("Location: payroll.php#about");
	}
}
?>
<?php
//getting id from url
$employee_id = $_GET['employee_id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM employee WHERE employee_id=$employee_id");

// echo "<table><tr><th>ID</th><th>Name</th><th>E-mail</th><th>Gender</th><th>Birth Date</th><th>Website</th><th>Address</th><th>department</th><th>Zip Code</th><th>City</th><th>Join Date</th><th>Annual Basic Pay</th></tr>";

while($res = mysqli_fetch_array($result))
{
    $employee_id = $res['employee_id'];
	$name = $res['name'];
	$gender = $res['gender'];
    $email = $res['email'];
    $birth_date = $res['birth_date'];
    $website = $res['website'];
    $address = $res['address'];
    $department = $res['department'];
    $city = $res['city'];
    $zip_code = $res['postal_code'];
    $join_date = $res['join_date'];
    $basic_pay = $res['annual_basic_pay'];  

}
?>
<html>
<head>	
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/style.css" />
      <!-- Boostrap 4 CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Boostrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>



</head>

<body>

<section id="Main">
        <?php include("includes/files/nav.php");?>
        <!-- About Me -->
        <section id="Two" >
        <div class="container-fluid p-5 w-100" style="background-color:#f6f6f6">
            <div class="container  h-100  ">
            

                <form  action="edit.php" method="post" id="contact_form">
                    <fieldset>

                        <!-- Form Name -->
                        <h1 class="p-2 text-dark text-center text-uppercase mb-5 border-bottom">Edit an Employee!</h1>
                        <div class="container">
                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Employee Id</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="employee_id"  class="form-control" type="text" value="<?php echo $employee_id; ?>">
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="name"  class="form-control" type="text" value="<?php echo $name; ?>">
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Birth Date</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input name="birth_date"  class="form-control" type="date" value="<?php echo $birth_date; ?>">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input name="email"  class="form-control" type="text" value="<?php echo $email; ?>">
                                    
                                </div>
                            </div>
                        </div>


                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <select name="gender"  class="form-control" value="<?php echo $gender; ?>">
                                    <option  >Please select your Gender</option>
                          <option>Male</option>
                          <option>Female</option>
                          
                          
                        </select>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Address</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="address" class="form-control" type="text" value="<?php echo $address; ?>">
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">City</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="city" class="form-control" type="text" value="<?php echo $city; ?>">
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Select Basic -->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Department</label>
                            <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                    <select name="department" class="form-control selectpicker">
                                        <option value="<?php echo $department; ?>" >Please select your Department</option>
                                        <option value="1">UX / UI Designer</option>
                                        <option value="2">Content Editor</option>
                                        <option value="3">Lead Designer</option>
                                        <option value="4">Content Producer</option>
                                        <option value="5">Tester</option>
                                        <option value="6">Developer</option>
                                        <option value="7">Marketing</option>
                          
                        </select>
                       
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label">Zip Code</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input name="zip"  class="form-control" type="text" value="<?php echo $zip_code; ?>">
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Website or domain name</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                    <input name="website"  class="form-control" type="text" value="<?php echo $website; ?>">
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Join Date</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                    <input name="join_date"  class="form-control" type="date" value="<?php echo $join_date; ?>">
                                  
                                </div>
                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Annual Pay</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                    <input name="basic_pay"  class="form-control" type="text" value="<?php echo $basic_pay; ?>">
                                    
                                </div>
                            </div>
                        </div>




                        <!-- Success message -->
                        

                        <!-- Button -->
                        <div class="form-group">
                            <div class="col-md-4 ">
                                <input type="submit" name="update" value="Update" class="btn btn-danger">
                            </div>
                        </div>
                        </div>
                    </fieldset>
                </form>
               
            </div>
        </div>

</body>
</html>
