<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll System</title>

    <!-- Boostrap 4 CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Boostrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="Main">
        <!-- Left Side -->
        <?php include("includes/files/nav.php");?>
        <!-- Right Side -->
        <section id="Two">
            <section class="sub-sec-one">
                <div class="container text-center p-3">
                    <header>
                        <spam>Hi! This is a <strong>Payroll Management System</strong></span>
                        <p>Insert/Update/Delete</p>
                    </header>

                    <footer>
                        <a href="#portfolio" class="btn btn-lg btn-outline-primary text-white">Employee</a>
                    </footer>
            </div>
            </section>

            <section class="sub-sec-two" id="portfolio" >
                <div class="container text-center " >
                <header>
                    <h2 class="h1 mb-3  text-uppercase">Employee</h2>
                </header>

                <p class="p-3">Here you can add,delete or update any number of employees.</p>

                <div class="row">
                    <div class="col">
                        <article class="item">
                           <img src="img/pic02.png" alt="" />
                            <header>
                            <a href="insert.php" class="btn btn-lg btn-success m-5">Insert</a>
                            </header>
                        </article>

                    </div>
                    <div class="col">
                        <article class="item">
                           <img src="img/pic03.png" alt="" />
                            <header>
                            <a href="delete1.php" class="btn btn-lg btn-warning m-5">Delete</a>
                            </header>
                        </article>

                    </div>
                    <div class="col">
                        <article class="item">
                          <img src="img/pic04.png" alt="" />
                            <header>
                            <a href="edit1.php" class="btn btn-lg btn-danger m-5">Update</a>
                            </header>
                        </article>

                    </div>
                </div>

                </div>
            </section>
            <section class="sub-sec-four" id="department">
              <!-- Department -->
                    <section id="department" >
                    <div class="container-fluid p-5 w-100">
                        <div class="container text-center">

                            <header>
                                <h2 class="text-uppercase mb-3 h1 ">Department</h2>
                            </header>

                            <p>List of all department</p>
                    <!-- php Logic here  -->
                    <?php
                        //including the database connection file
                        include("connection.php");

                        $result = mysqli_query($conn, "SELECT * FROM department ORDER BY department_id ASC"); // using mysqli_query instead
                        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                                echo "<table class='table table-bordered table-hover '><thead class='h5 text-white ' style='background-color: #0a121e;'><tr><th>Department ID</th><th>Name</th><th>Location</th></tr></thead>";
                            while($res = mysqli_fetch_array($result)  ) { 		
                                
                                echo "<tr><td>" . $res["department_id"]. "</td><td>" . $res["department_name"]. "</td><td> " . $res["location"]. "</td></tr> " ;
                                }


                                echo "</table>";
            
                            
                        ?>
                        </div>
                    
            </section>
            <section class="sub-sec-three" id="about">
                <div class="container-fluid  text-center">   
                        <header>
                            <h2 class="text-uppercase mb-3 h1 ">List</h2>
                        </header>

                        <p>List of all employees</p>
                            <?php
                        //including the database connection file
                        include("connection.php");

                        $result = mysqli_query($conn, "SELECT * FROM employee e ,department d where e.department = d.department_id ORDER BY employee_id ASC"); // using mysqli_query instead
                            //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                                echo "<table class='table table-bordered table-hover '><thead class='h5 text-white ' style='background-color: #0a121e;'><tr><th>Emp ID</th><th>Name</th><th>Job ID</th><th>E-mail</th><th>City</th><th>Join Date</th><th>Annual Basic Pay</th></tr></thead>";
                            while($res = mysqli_fetch_array($result)) { 		
                                
                                echo "<tr><td>" . $res["employee_id"]. "</td><td>" . $res["name"]. "</td><td>" . $res["department_name"]. "</td><td> " . $res["email"]. "</td><td> " . $res["city"]. "</td><td> " . $res["join_date"]. "</td><td> " . $res["annual_basic_pay"]. "</td></tr>";
                                }
                                echo "</table>";
                            // 	echo "<td>".$res['employee_id']."</td>"."&nbsp";
                            // 	echo "<td>".$res['name']."</td>"."&nbsp";
                            // 	echo "<td>".$res['email']."</td>"."<br>";	
                            // 	echo "<td><a href=\"edit.php?employee_id=$res[employee_id]\">Edit</a> | <a href=\"delete.php?id=$res[employee_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
                            // }
                            
                        ?>
                </div>
                
            </section>

            <section class="sub-sec-five" id="contact">
                <!-- Contact -->
                <section id="contact" >
                <div class="container-fluid  w-100 text-center" >

                        <header>
                            <h2 class="text-uppercase mb-3 h1 ">Pay Slip</h2>
                        </header>
                        <?php
                        //including the database connection file
                        include("connection.php");

                            //  $result = mysqli_query($conn, "SELECT * FROM employee ORDER BY employee_id ASC"); // using mysqli_query instead
                            $sql = "SELECT * FROM employee ORDER BY employee_id ASC";
                            $result = $conn->query($sql); 

                                echo "<table class='table table-bordered table-hover '><thead class='h5 text-white ' style='background-color: #0a121e;'><tr><th>ID</th><th>Name</th><th>E-mail</th><th>Join Date</th><th>Annual Basic Pay</th><th>Monthly Pay(after_tax)</th><th>Tax</th></tr></thead>";//<th>Export</th>
                            while($res = mysqli_fetch_array($result)) { 		
                                // while($res = $result->fetch_assoc()) {
                                
                                echo "<tr><td>" . $res["employee_id"]. "</td><td>" . $res["name"]. "</td><td> " . $res["email"]. "</td><td> " . $res["join_date"]. "</td><td> " . $res["annual_basic_pay"]." &#8377". "</td><td> " . $res["monthly_pay"]." &#8377". "</td><td> " . $res["tax"]." %". "</td></tr>";
                                }
                                echo "</table>";

                            
                        ?>
                        
                    </div>
                </section>
            </section>
        </section> 
        </section>
</body>
</html>