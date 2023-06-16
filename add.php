<?php

  include_once("connections/connect.php");
  $conn = connect();


  

   if (isset($_POST['Submit'])) {

      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $gender = $_POST['gender'];
      $birthdate = $_POST['birthdate'];
      $course = $_POST['course'];
      $school = $_POST['school'];
      $department = $_POST['department'];
      $address = $_POST['address'];
      $gmail = $_POST['gmail'];
      $contact = $_POST['contact'];

     
     $sql = "INSERT INTO `student_list`( `first_name`, `last_name`, `gender`,`birthdate`,`course`,`school`,`department`,`address`,`gmail`,`contact`) 
     VALUES ('$fname','$lname','$gender','$birthdate','$course',' $school','$department','$address','$gmail',' $contact')";
     
     $conn->query($sql) or die ($conn->error);

    echo header("Location: index.php");

   }


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Management System</title>
	<link rel="stylesheet"  href="design.css">
   

</head>
<body>
   <div class="title">ADD FORM</div>
   <div class="add-container">
 

    <form action="" method="post">
      
     <label >First Name</label>
     <input type="text" name="firstname" id="firstname" placeholder="Enter First Name"required>
       


     <label>Last Name</label>
     <input type="text" name="lastname" id="lastname"placeholder="Enter Last Name"required>

     <label>Birthdate</label>
     <input type="text" name="birthdate" id="birthdate"placeholder="Enter Birthdate"required>

     <label>Course</label>
     <input type="text" name="course" id="course"placeholder="Enter Course"required>

     <label>School</label>
     <input type="text" name="school" id="school"placeholder="Enter School"required>

     <label>Department</label>
     <input type="text" name="department" id="department"placeholder="Enter Department"required>

     <label>Address</label>
     <input type="text" name="address" id="address"placeholder="Enter Address"required>

    <label>Gmail</label>
     <input type="text" name="gmail" id="gmail"placeholder="Enter Gmail"required>

     <label>Contact</label>
     <input type="text" name="contact" id="contact"placeholder="Enter Contact"required>



     


     <label>Gender</label>
     <select name="gender" id="gender" required>
      <option value="">--Select Gender--</option>
      <option value="Male" >Male</option>
      <option value="Female" >Female</option>
     



     </select>

     <input type="submit" name="Submit" value="Submit Form">


 

  </form>



  </div>


</body>
</html>


