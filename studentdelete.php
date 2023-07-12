<?php 
	include('connect.php');
	if (isset($_REQUEST['did'])) {
		$StudentID=$_REQUEST['did'];
		$Select="DELETE FROM student WHERE studentid='$StudentID'";
		$query=mysqli_query($connection, $Select);
		if($query){
			echo "<script>alert('Delete Successful')
			window.location='studentlist.php'
			</script>";
		}
	}
 ?>