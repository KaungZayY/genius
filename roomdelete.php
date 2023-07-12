<?php 
	include('connect.php');
	if (isset($_REQUEST['did'])) {
		$RoomID=$_REQUEST['did'];
		$Select="DELETE FROM room WHERE RoomID='$RoomID'";
		$query=mysqli_query($connection, $Select);
		if($query){
			echo "<script>alert('Room Delete Successful')
			window.location='roomlist.php'
			</script>";
		}
	}
 ?>