<?php
   include("connection.php");

   //getting id of the data from url
   $employee_id = $_GET['employee_id'];
   $result = mysqli_query($conn, "SELECT * FROM employee  , department  WHERE employee_id=$employee_id AND employee.employee_id=department.department_id");
   while($res = mysqli_fetch_array($result)) {  
    
    $employee_id = $res['employee_id'];
	$name = $res['name'];
    $email = $res['email'];
    $address = $res['address'];
    $department = $res['department_name'];
    // $department_id =$res['department_id'];
    $city = $res['city']; 


    // calculation
    $amount = $res['annual_basic_pay'];
    $monthly_sal = $amount / 12;
   
    # Allowance For EMP
    $basic = round($monthly_sal,2);
    # 1. Medical Allowance
    $medical = round(($monthly_sal / 50 ),2);
    # 2. House Rent Allowance :-
    $house = round(($monthly_sal / 60),2);
    # 3. Travels Allowance
    $travels = round(($monthly_sal / 65),2);

    # Total Earning Amount
    $Total_earning = $basic + $medical + $house + $travels;
    

    # Deduction
    $professional_tax = $monthly_sal / 85;
    $Provident_fund = $monthly_sal / 50;
    $loan = 0.00;

    $Total_deduction = $professional_tax + $Provident_fund;

    $net_salary = $Total_earning + $Total_deduction;
   }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Salary Slip</title>
    <!-- Boostrap 4 CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>

    <!-- Boostrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <!-- style to create vertical line -->
    <style>
      .vertical {
        border-left: 1px solid black;
        height: 180px;
        position: absolute;
        left: 50%;
      }
      body{
          font-size:20px;
          background-image: linear-gradient(to right bottom, #d6b1b1, #b98b99, #966988, #684c7b, #2a366d);
      }
    </style>
  </head>
  <body>
    <!-- Salary Slip Section -->
      <!-- <div id="main"> -->
      <section id="Main ">
        <?php include("includes/files/nav.php");?>
        <!-- About Me -->
        <section id="Two">     
        <div class="container-fluid  w-100" style="background-color:#f6f6f6">

  <div class="container">
  <div class=" p-4 border border-dark mt-5 text-capitalize ">
  <div class="float-right"><span class=" font-weight-bold">Phone No:-</span> 022 25252221 </div><br>
      <!-- header -->
      <h3 class="text-center">Web Solution Private Limited</h3>
      <h5 class="text-center ">Akruti Rising City ghatkopar east mumbai 400-077</h5>
      <br />
      <div class="text-center  w-100 bg-dark p-1 mb-3 text-white border rounded-light text-uppercase">Salary Slip for <?php echo $today = date("M Y");?></div>
      <div class="row border-bottom border-dark  clearfix">
        <div class="col-6 float-left">
          <div class="col-12">Employee Id:- <?php echo $employee_id; ?></div>
          <div class="col-12">Email:- <?php echo $email;?></div>
          <div class="col-12">Location :- <?php echo $city;?></div>

        </div>
        <div class="col-6 float-right">
          <div class="col-12">Name:- <?php echo $name;?></div>
          <div class="col-12">Designation :- <?php echo $department;?> </div>
          <div class="col-12">Date :- <?php echo $today = date("d/m/Y");?></div>
        </div>
      </div>
      <!-- <hr class="bg-dark" /> -->
      <!-- header -->
      <!-- amount section -->
      <div class="row clearfix border-bottom border-dark mt-2">
        <div class="col-6">
          <div class="float-left">
            <span class="font-weight-bold border-bottom border-dark">Earning</span><br />
            <span>Basic pay :-</span><br />
            <span>Medical Allowance :-</span><br />
            <span>Housing Allowance :-</span><br />
            <span>Travels Allowance :-</span><br />
          </div>
          <div class="float-right">
            <span class="font-weight-bold border-bottom border-dark"> Amount</span><br />
            <span><?php echo $basic;?></span><br />
            <span><?php echo $medical;?></span><br />
            <span><?php echo $house;?></span><br />
            <span><?php echo $travels;?></span><br />
          </div>
        </div>
        <div class="vertical"></div>
        <div class="col-6">
          <div class="float-left">
            <span class="font-weight-bold border-bottom border-dark">Deduction</span><br />
            <span>professional_tax</span><br>
            <span>Provident Fund</span><br />
            <!-- <span>Loan</span><br /> -->
          </div>
          <div class="float-right">
            <span class="font-weight-bold border-bottom border-dark">Amount</span><br />
            <span><?php echo round($professional_tax,2);?></span><br />
            <span><?php echo round($Provident_fund,2);?></span><br />
            <!-- <span><?php echo round($loan,2);?></span><br /> -->
          </div>
        </div>
      </div>
      <!-- <hr class="bg-dark" /> -->
      <!-- amount section -->
      <!-- total calculation -->
      <div class="row clearfix border-bottom border-dark">
        <div class="col-6">
          <span class="float-left font-weight-bold">Total Earning (Rounded)</span>
          <span class="float-right"><?php echo round($Total_earning,2);?></span>
        </div>
        <div class="col-6">
          <span class="float-left font-weight-bold"
            >Total Deduction (Rounded)</span
          >
          <span class="float-right "><?php echo round($Total_deduction,2);?></span>
        </div>
      </div>
      <!-- <hr class="bg-dark" /> -->
      <!-- total calculation -->
      <div class="row border-bottom border-dark">
        <div class="col-6"></div>
        <div class="col-6 clearfix">
          <span class="float-left font-weight-bold">Net Salary</span>
          <span class="float-right"><?php echo round($net_salary,2);?></span>
        </div>
      </div>
      <!-- total calculation -->
      <!-- Employee Signature -->
      <div class="row clearfix mt-5">
        <div class="col-6 mt-5">
          <span>--------------------</span><br />
          <span class="float-light ml-4 font-weight-bold"> Manager</span>
        </div>
        <div class="col-6 mt-5">
          <span class="float-right">--------------------</span><br />
          <span class="float-right mr-4 font-weight-bold">Employee</span>
        </div>
      </div>
      </div>
      <div class="btn btn-lg btn-danger m-2"><a href="payroll.php#contact" class="text-white">Back</a></div>
    </div>
    
    
  </body>
</html>




























<?php
//    echo'<div class="container p-4 border border-dark mt-5">';
//     //   <!-- header -->
//     echo '<h3 class="text-center">Comany Name</h3>';
//       echo '<h4 class="text-center">address</h4>';
//       echo '<br />';
//      echo'<div class="row border-bottom border-dark p-3 clearfix">';
//        echo'<div class="col-6 float-left">';
//           echo '<div class="col-6">Employee ID:- '.$res["employee_id"].'</div>';
//          echo'<div class="col-7">Department ID:- '.$res["department"].'</div>';
//          echo'<div class="col-7">Location:- '.$res["city"].'</div>';
//         echo '</div> ';
//        echo '<div class="col-6 float-right">';
//          echo'<div class="col-6">Name:- '.$res["name"].'</div> ';
//          echo'<div class="col-6">Designation :- '.$res["department"].'</div> ';
//          echo'<div class="col-6">Date :- '.$today = date("d-m-Y").'</div> ';
//        echo '</div> ';
//       echo '</div> ';
//     //   <!-- <hr class="bg-dark" /> -->
//     //   <!-- header -->
//     // calculation
//         $amount = $res["annual_basic_pay"];
//         $monthly_sal = $amount / 12;
//         // print("Annual Salary :-", amount)
//         // print("Monthly Salary :-", round(monthly_sal) )

//         # Allowance For EMP
//         $basic = round($monthly_sal,2);
//         // print("Basic pay: -", basic, ".00")
//         # 1. Medical Allowance
//         $medical = round(($monthly_sal / 50 ),2);
//         // print("Medical Allowance :-", medical, ".00")
//         # 2. House Rent Allowance :-
//         $house = round(($monthly_sal / 60),2);
//         // print("House Rent Allowance :-", house, ".00")
//         # 3. Travels Allowance
//         $travels = round(($monthly_sal / 65),2);
//         // print("Travels Allowance :-" , travels, ".00")

//         # Total Earning Amount
//         $Total_earning = $basic + $medical + $house + $travels;
//         // print("Total Earning Amount :-", Total_earning, ".00")
//         // print()

//         # Deduction
//         $professional_tax = $monthly_sal / 85;
//         $Provident_fund = $monthly_sal / 50;
//         $loan = 0;

//         // print(monthly_sal)
//         // print("profes Tax :-" , round(professional_tax),".00")
//         // print("prov Fund :- ", round(Provident_fund),".00")

//         // $Total_dedcution = professional_tax + Provident_fund
//         // print("Total Dec :-",round(Total_dedcution))

//         // print("NET SAL :-", round(Total_earning - Total_dedcution),".00")

//     //   <!-- amount section -->
//      echo'<div class="row clearfix border-bottom border-dark">';
//        echo'<div class="col-6">';
//          echo'<div class="float-left">';
//           echo' <span class="font-weight-bold">Earning</span><br />';
//             echo '<span>Basic pay :-</span><br />';
//            echo '<span>Medical Allowance :-</span><br /> ';
//             echo '<span>Housing Allowance :-</span><br />';
//            echo '<span>Food Allowance :-</span><br />';
//           echo '</div> ';
//          echo'<div class="float-right">';
//             echo '<span class="font-weight-bold"> Amount</span><br />';
//            echo '<span>'$monthly_sal;'</span><br />';
//             echo '<span>300.00</span><br />';
//             echo '<span>400.00</span><br />';
//             echo '<span>600.00</span><br />';
//           echo '</div> ';
//         echo '</div> ';
//        echo'<div class="vertical"></div> ';
//        echo'<div class="col-6">';
//          echo '<div class="float-left">';
//             echo '<span class="font-weight-bold">Deduction</span><br />';
//            echo '<span>Provident Fund</span><br />';
//            echo '<span>Loan</span><br />';
//          echo '</div> ';
//          echo'<div class="float-right">
//             <span class="font-weight-bold">Amount</span><br />';
//            echo '<span>120.00</span><br />';
//            echo '<span>0.00</span><br />';
//          echo '</div> ';
//        echo '</div> ';
//      echo '</div> ';
//     //   <!-- <hr class="bg-dark" /> -->
//     //   <!-- amount section -->
//     //   <!-- total calculation -->
//      echo'<div class="row clearfix border-bottom border-dark">';
//        echo'<div class="col-6"> ';  
//           echo '<span class="float-left font-weight-bold">Total Earning Amount</span> ';
//           echo '<span class="float-right mr-4">$000</span> ';
//         echo '</div> ';
//        echo'<div class="col-6">';
//           echo '<span class="float-left font-weight-bold">Total Deduction Amount</span> ';
//           echo '<span class="float-right mr-4">$000</span>';
//        echo '</div> ';
//       echo '</div> ';
//     //   <!-- <hr class="bg-dark" /> -->
//     //   <!-- total calculation -->
//      echo'<div class="row border-bottom border-dark">';
//        echo'<div class="col-6"></div> ';
//        echo'<div class="col-6 clearfix">';
//           echo '<span class="float-left font-weight-bold">Net Salary</span>';
//           echo '<span class="float-right">4000.00</span>';
//        echo '</div> ';
//       echo '</div> ';
//     //   <!-- total calculation -->
//     //   <!-- Employee Signature -->
//      echo'<div class="row clearfix mt-5">';
//        echo'<div class="col-6 mt-5">';
//         echo '<span>--------------------</span><br />';
//           echo '<span class="float-light">Payroll Manager</span>';
//        echo '</div> ';
//        echo'<div class="col-6 mt-5">';
//           echo '<span class="float-right">--------------------</span><br />';
//           echo '<span class="float-right mr-4">Employee</span>';
//         echo '</div> ';
//       echo '</div> ';
//     echo '</div> ';
//    }
?>
