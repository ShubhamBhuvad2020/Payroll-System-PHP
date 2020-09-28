<html>

<head>
    <title>Insert an employee</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Boostrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Boostrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

   
</head>

<body>
<?php
     $gender="";
     $name="";
     $email="";
     $birth_date="";
     $address="";
     $city="";
     $department="";
     $website="";
     $join_date="";
     $basic_pay="";
     $employee_id="";
     $zip_code="";
     

     $genderErr="";
     $nameErr="";
     $emailErr="";
     $birth_dateErr="";
     $addressErr="";
     $cityErr="";
     $departmentErr="";
     $websiteErr="";
     $join_dateErr="";
     $basic_payErr="";
     $employee_idErr="";
     $zip_codeErr="";
     

     if($_SERVER["REQUEST_METHOD"]=="POST"){
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
          } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
              $nameErr = "Only letters and white space allowed"; 
            }
          }

        
         
            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
              } else {
                $gender = test_input($_POST["gender"]);
         }
         
         if(empty($_POST["email"])){
            $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
          }
        }
         
        
            if (empty($_POST["address"])) {
                $addressErr = "Address is required";
              } else {
                $address = test_input($_POST["address"]);
         }
        
        
            if (empty($_POST["city"])) {
                $cityErr = "city is required";
              } else {
                $city = test_input($_POST["city"]);
         }
         
        if (empty($_POST["department"])) {
            $departmentErr = "department is required";
          } else {
            $department = test_input($_POST["department"]);
         }
         
         if(empty($_POST["website"])){
            $website = "";
        } else {
          $website = test_input($_POST["website"]);
        
          // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "Invalid URL"; 
          }
        }
      
         
        if (empty($_POST["basic_pay"])) {
            $basic_payErr = "pay is required";
          } else {
            $basic_pay = test_input($_POST["basic_pay"]);
         }
        
         if (empty($_POST["employee_id"])) {
            $employee_idErr = "Id is required";
          } else {
            $employee_id = test_input($_POST["employee_id"]);
         }
         
         if (empty($_POST["zip"])) {
            $zip_codeErr = "zip is required";
          } else {
            $zip_code = test_input($_POST["zip"]);
         }
        
         if (empty($_POST["birth_date"])) {
            $birth_dateErr = "Birth Date is required";
          } else {
            $birth_date = test_input($_POST["birth_date"]);
         }
        
         if (empty($_POST["join_date"])) {
            $join_dateErr = "Date is required";
          } else {
            $join_date = test_input($_POST["join_date"]);
         }
   
         include("connection.php");


      



                $name = $conn->real_escape_string($_POST["name"]);
                $gender = $conn->real_escape_string($_POST["gender"]);
                $join_date = $conn->real_escape_string($_POST["join_date"]);
                $birth_date = $conn->real_escape_string($_POST["birth_date"]);
                $zip_code = $conn->real_escape_string($_POST["zip"]);
                $employee_id = $conn->real_escape_string($_POST["employee_id"]);
                $basic_pay = $conn->real_escape_string($_POST["basic_pay"]);
                $website = $conn->real_escape_string($_POST["website"]);
                $department = $conn->real_escape_string($_POST["department"]);
                $city = $conn->real_escape_string($_POST["city"]);
                $address = $conn->real_escape_string($_POST["address"]);
                $email = $conn->real_escape_string($_POST["email"]);
                    
                 $sql="INSERT INTO `employee` ( `employee_id`,`name`, `gender`, `birth_date`, `address`, `city`, `department`, `postal_code`, `email`, `website`, `join_date`, `annual_basic_pay`)
                  VALUES('$employee_id','$name','$gender','$birth_date',
                                '$address','$city','$department','$zip_code',
                               '$email','$website','$join_date','$basic_pay')";
                   $success = $conn->query($sql);


                   $mysql3="Update employee SET tax = 15 where annual_basic_pay < 45916; ";
                   $mysql4="Update employee SET tax = 20.5 where annual_basic_pay > 45916 AND annual_basic_pay < 91831; ";
                   $mysql5="Update employee SET tax = 26 where annual_basic_pay < 142353 AND annual_basic_pay > 91831; ";
                   $mysql6="Update employee SET tax = 29 where annual_basic_pay < 202800 AND annual_basic_pay > 142353; ";
                   $mysql7="Update employee SET tax = 33 where annual_basic_pay > 202800; ";
                   $conn->query($mysql3);
                   $conn->query($mysql4);
                   $conn->query($mysql5);
                   $conn->query($mysql6);
                   $conn->query($mysql7);



                   
                   $my="Update employee SET tax_amount = (annual_basic_pay/12) * ((tax+100)/100);";
                   $conn->query($my);
                    $mysql2="Update employee SET monthly_pay = (annual_basic_pay/6)- tax_amount;";
                    $conn->query($mysql2);
                   
                   if(!$success){
                       die("couldn't enter data: ".$conn->error);
         
                   }   else{
                    header("Location: payroll.php#about");
                   }
                   $conn->close();         


        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        
  ?>
  

        <!-- Header -->
        <section id="Main">
        <?php include("includes/files/nav.php");?>
        <section id="Two">
        <div class="container-fluid p-5 w-100" style="background-color:#f6f6f6">
                <div class="container text-center">

                    
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="contact_form">
                    <fieldset >

                        <!-- Form Name -->
                        <h1 class=" text-dark text-center text-uppercase mb-5 border-bottom">Insert an Employee!</h1>
                        
                        <table class="table table-borderless border">
                            <thead>
                                <tr>
                                <th scope="col">
                                    <label >Employee Id</label>
                                    <span style="color: red;">* <?php echo $employee_idErr;?></span>
                                </th>
                                <th scope="col">
                                    <label >Name</label>
                                    <span style="color: red;">* <?php echo $nameErr;?></span>
                                </th>
                                <th scope="col">
                                    <label >Birth Date</label>
                                    <span style="color: red;">* <?php echo $birth_dateErr;?></span>
                                </th>
                                <th scope="col">
                                    <label >E-Mail</label>
                                    <span style="color: red;">* <?php echo $emailErr;?></span>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>
                                    <input name="employee_id" placeholder="Employee Id" class="form-control" type="text" value="<?php echo $employee_id; ?>" required >
                                </td>
                                <td>
                                    <input name="name" placeholder="Employee Name" class="form-control" type="text" value="<?php echo $name; ?>">
                                </td>
                                <td>
                                    <input name="birth_date" placeholder="Birth Date" class="form-control" type="date" value="<?php echo $birth_date; ?>">
                                </td>
                                <td>
                                    <input name="email" placeholder="E-Mail Address" class="form-control" type="text" value="<?php echo $email; ?>">
                                </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                <th scope="col">
                                    <label >Gender</label>
                                    <span style="color: red;">* <?php echo $genderErr;?></span>
                                </th>
                                <th scope="col">
                                    <label >Address</label>
                                    <span style="color: red;">* <?php echo $addressErr;?></span>
                                </th>
                                <th scope="col">
                                    <label >City</label>
                                    <span style="color: red;">* <?php echo $cityErr;?></span>
                                </th>
                                <th scope="col">
                                    <label >Department</label>
                                    <span style="color: red;">* <?php echo $departmentErr;?></span>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>
                                    <select name="gender"  class="form-control" value="<?php echo $gender; ?>">
                                        <option>Please select your Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </td>
                                <td>
                                    <input name="address" placeholder="Address" class="form-control"   type="text" value="<?php echo $address; ?>">
                                </td>
                                <td>
                                    <input name="city" placeholder="city" class="form-control" type="text" value="<?php echo $city; ?>">
                                </td>
                                <td>
                                    <select name="department" class="form-control selectpicker" value="<?php echo $department; ?>">
                                        <option>Please select your department</option>
                                        <option value="1">UX / UI Designer</option>
                                        <option value="2">Content Editor</option>
                                        <option value="3">Lead Designer</option>
                                        <option value="4">Content Producer</option>
                                        <option value="5">Tester</option>
                                        <option value="6">Developer</option>
                                        <option value="7">Marketing</option>
                                    </select>
                                </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                <th scope="col">
                                    <label >Zip Code</label>
                                    <span style="color: red;">* <?php echo $zip_codeErr;?></span>
                                </th>
                                <th scope="col">
                                    <label >Website or domain name</label>
                                    <span style="color: red;">* <?php echo $websiteErr;?></span>
                                </th>
                                <th scope="col">
                                    <label >Join Date</label>
                                    <span style="color: red;">* <?php echo $join_dateErr;?></span>
                                </th>
                                <th scope="col">
                                    <label >Annual Pay</label>
                                    <span style="color: red;">*<?php echo $basic_payErr;?></span>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>
                                    <input name="zip" placeholder="Zip Code" class="form-control" type="text" value="<?php echo $zip_code; ?>">
                                </td>
                                <td>
                                    <input name="website" placeholder="Website or domain name" class="form-control" type="text" value="<?php echo $website; ?>">
                                </td>
                                <td>
                                    <input name="join_date" placeholder="Joining Date" class="form-control" type="date" value="<?php echo $join_date; ?>">
                                </td>
                                <td>
                                    <input name="basic_pay" placeholder="Annual basic pay (&#8377)" class="form-control" type="text" value="<?php echo $basic_pay; ?>">
                                </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Success message -->
                        <!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> New Employee Added.</div> -->

                        <!-- Button -->
                        <div>
                            <label ></label>
                            <div class="col">
                                <button onclick="alert('Employee Added Successfully!')" class="btn btn-success btn-lg  ">ADD <span class="glyphicon glyphicon-send"></span></button>
                                
                            </div>
                    </fieldset>
                </form>
                </div>
            </div>
            </section>
        </div>
    

      
       
</body>
</html>