<?php 
	include('connect.php');
	if (isset($_REQUEST['did'])) {
		$CourseID=$_REQUEST['did'];
		$Select="DELETE FROM course WHERE CourseID='$CourseID'";
		$query=mysqli_query($connection, $Select);
		if($query){
			echo "<script>alert('Course Delete Successful')
			window.location='courselist.php'
			</script>";
		}
	}
 ?>