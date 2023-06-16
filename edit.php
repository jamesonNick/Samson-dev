<?php

  include_once("connections/connect.php");
  $conn = connect();
  
  $id =$_GET['ID'];


  $sql = "SELECT * FROM student_list WHERE id = '$id'";
  $students = $conn->query($sql) or die($conn->error);
  $row = $students->fetch_assoc();

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

     
     $sql = "UPDATE  student_list SET first_name = '$fname' , last_name = '$lname' , gender = '$gender' ,birthdate =' $birthdate' 
     ,course =' $course' ,school =' $school' ,department =' $department' ,address  = '$address' ,gmail =' $gmail' ,contact =' $contact'
     WHERE id = '$id'";
     
     $conn->query($sql) or die ($conn->error);

    echo header("Location: details.php?ID=".$id);

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
   <div class="title">Edit Form</div>
   <div class="add-container">
      
  <form action="" method="post">
     <label>First Name</label>
     <input type="text" name="firstname" id="firstname" placeholder="Enter First Name"value="<?php echo $row['first_name'];?>">

     <label>Last Name</label>
     <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name" value="<?php echo $row['last_name'];?>">
     
     <label>Birthdate</label>
     <input type="text" name="birthdate" id="birthdate" placeholder="Enter Birthdate"value="<?php echo $row['birthdate'];?>">
     
     <label>Course</label>
     <input type="text" name="course" id="course" placeholder="Enter Course" value="<?php echo $row['course'];?>">
     
     <label>School</label>
     <input type="text" name="school" id="school" placeholder="Enter School"value="<?php echo $row['school'];?>">

     <label>Department</label>
     <input type="text" name="department" id="department" placeholder="Enter Department"value="<?php echo $row['department'];?>">
     
     <label>Address</label>
     <input type="text" name="address" id="address" placeholder="Enter Address"value="<?php echo $row['address'];?>">

     <label>Gmail</label>
     <input type="text" name="gmail" id="gmail" placeholder="Enter Gmail" value="<?php echo $row['gmail'];?>">

     <label>Contact</label>
     <input type="text" name="contact" id="contact" placeholder="Enter Contact"value="<?php echo $row['contact'];?>">

     


     <label>Gender</label>
     <select name="gender" id="gender">
      <option value="">--Select Gender--</option>
      <option value="Male" <?php echo ($row['gender'] == "Male")? 'selected' : '';?> >Male</option>
      <option value="Female" <?php echo ($row['gender'] == "Female")? 'selected' : '';?> >Female</option>
     



     </select>

     <input type="submit" name="Submit" value="Update">




  </form>


  </div>



</body>
</html>


