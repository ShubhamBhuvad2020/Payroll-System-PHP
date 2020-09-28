<?php

         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "payroll";
         // Create connection
         $conn = mysqli_connect($servername, $username, $password,$dbname);
        
        // Check connection
        if(!$conn){
            die("Connection Failed");
        }
      //   else{
      //   die("Connected Succesfully ");
      // }
?>