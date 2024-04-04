<?php  
include 'connect.php';

$emp_id = $_GET['emp_id'];
$query = "DELETE FROM employee WHERE emp_id = $emp_id";
$result = mysqli_query($connect,$query) or die (mysqli_error($connect));
header("Location: index.php"); 
?>