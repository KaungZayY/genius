<?php 
	include('connect.php');
	if (isset($_REQUEST['did'])) {
		$LectureID=$_REQUEST['did'];
		$Select="DELETE FROM lecture WHERE lectureid='$LectureID'";
		$query=mysqli_query($connection, $Select);
		if($query){
			echo "<script>alert('Delete Successful')
			window.location='lecturelist.php'
			</script>";
		}
	}
 ?>