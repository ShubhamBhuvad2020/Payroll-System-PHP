<html>

<head>
    <title>Payrol management system</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/style.css" />
     <!-- Boostrap 4 CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Boostrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


</head>

</style>
<body>

   

    <!-- Main -->
    <!-- <div id="main"> -->
    <section id="Main">
        <?php include("includes/files/nav.php");?>
        <!-- About Me -->
        <section id="Two" >
        <div class="container-fluid p-5 w-100" style="background-color:#f6f6f6">
            <div class="container text-center h-100  ">
            <h1 class="p-2 text-dark  text-uppercase mb-5 border-bottom">Remove employee</h1>
                <header>
                    <h2>List</h2>
                </header>

                <p>List of all employees</p>
                <?php
//including the database connection file
       include("connection.php");
        $result = mysqli_query($conn, "SELECT * FROM employee ORDER BY employee_id ASC"); // using mysqli_query instead
    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        echo "<table class='table table-bordered table-hover '><thead class='thead-dark h5'><tr><th>ID</th><th>Name</th><th>E-mail</th><th>City</th><th>Join Date</th><th>Annual Basic Pay</th><th>Del</th></tr>";
	while($res = mysqli_fetch_array($result)) { 		
        
        echo "<tr><td>" . $res["employee_id"]. "</td><td>" . $res["name"]. "</td><td> " . $res["email"]. "</td><td> " . $res["city"]. "</td><td> " . $res["join_date"]. "</td><td> " . $res["annual_basic_pay"]. "</td><td><a class='btn btn-danger' href=\"delete.php?employee_id=$res[employee_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></tr>";
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

        <!-- Contact -->
        

    </div>

    
</body>

</html>