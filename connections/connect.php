<?php

  function connect(){

  $host = "localhost";
  $username = "root";
  $password = "qwertys";
  $database = "student_system";

  $conn = mysqli_connect($host, $username, $password, $database);


  if($conn->connect_error){
  	  echo $conn->connect_error;
  }else{
      return $conn;
     


  }

  }
