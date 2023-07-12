<?php 
	include('connect.php');
	if (isset($_REQUEST['did'])) {
		$SubjectID=$_REQUEST['did'];
		$Select="DELETE FROM subject WHERE SubjectID='$SubjectID'";
		$query=mysqli_query($connection, $Select);
		if($query){
			echo "<script>alert('Subject Deleted')
			window.location='subject.php'
			</script>";
		}
	}
 ?>