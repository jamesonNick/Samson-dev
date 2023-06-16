<?php
  if (!isset($_SESSION)) {
     session_start();

 }
  if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator") {
  	  echo "<div class='successful'>Welcome ".$_SESSION['UserLogin']."</div><br/><br/>";

}else{
    echo header("Location: index.php");
}
   




  include_once("connections/connect.php");
  $conn = connect();

  $id = $_GET['ID'];

 

  $sql = "SELECT * FROM student_list WHERE id = '$id'";
  $students = $conn->query($sql) or die($conn->error);
  $row = $students->fetch_assoc();

// do {

//   echo $row['first_name']." ".$row['last_name']. "<br/>";

// }while ($row = $students->fetch_assoc()); 



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Management System</title>
	<link rel="stylesheet"  href="design.css">
   

</head>
<body id="oli">
  <div class="deleted">
  <div class="wrapper">

   <form action="delete.php" method="post">
    <div class="button-container">
   <a href="index.php"> <- Back</a> 
   <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a>

     <?php if($_SESSION['Access'] == "administrator"){?>
   <button type = "submit" name = "delete" class="button-danger">Delete</button>
     <?php }?>
     </div>

   <input type="hidden" name= "ID" value="<?php echo $row['id'];?>">

   </form>
 

<br/>





    <h2><?php echo $row['first_name'];?> <?php echo $row['last_name'];?> </h2>
    <p>is a <?php echo $row ['gender'];?></p>
	
    </div>
    </div>
</body>
</html>



