<?php
  if (!isset($_SESSION)) {
     session_start();

 }
  if (isset($_SESSION['UserLogin'])) {
  	  echo "<div class='successful'>Welcome ".$_SESSION['UserLogin'].'</div>';

}else{
     echo "<div class='message info'>Welcome Guest</div>";



  }
   




  include_once("connections/connect.php");
  $conn = connect();


  $sql = "SELECT * FROM student_list ORDER BY id DESC";
  $students = $conn->query($sql) or die($conn->error);
  $row = $students->fetch_assoc();





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
	   <div class="wrapper">
	<h1>Student Management System</h1>
	<br/>
	<br/>
	      <div class="search-bar">
       <form action="result.php" method="get">
	   <input type="text" name = "search" id="search" class="search-input">
	   <button type="submit" class="submit-button">search</button>
	 



	   </form>
	   </div>

	   <div class="button-container">
	<?php if (isset($_SESSION['UserLogin'])) { ?>
		
	
	<a href="logout.php">Logout</a>
   <?php }else{ ?>


       <a href="login.php">Login</a>
       
    <?php } ?>

	<a href="add.php ?>">Add New</a>
	</div>



 <table>
 	<thead>
 	<tr>
	 <th></th>	
 	 <th>First Name</th>	
     <th>Last Name</th> 
	 <th>Birthdate</th> 
	 <th>Course</th>	
     <th>School</th>    
	 <th>Department</th>	
     <th>Adress</th>    
	 <th>Gmail</th>	
     <th>Contact</th>      

 	</tr>
 	</thead>
 	 <tbody>
 	 	<?php do{ ?>
 	  <tr> 
		<td width="30"><a href="details.php?ID=<?php echo $row['id'];?>" class="view-button">view</a></td>
       <td><?php echo $row['first_name']; ?></td>
       <td><?php echo $row['last_name']; ?></td>
	   <td><?php echo $row['birthdate']; ?></td>
	   <td><?php echo $row['course']; ?></td>
	   <td><?php echo $row['school']; ?></td>
	   <td><?php echo $row['department']; ?></td>
	   <td><?php echo $row['address']; ?></td>
	   <td><?php echo $row['gmail']; ?></td>
	   <td><?php echo $row['contact']; ?></td>




 	  </tr>
        <?php }while ($row = $students->fetch_assoc()) ?>
        
     </tbody>
 </table>
  
 </div>
</body>
</html>



