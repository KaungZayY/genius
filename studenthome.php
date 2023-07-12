<?php 
	include('connect.php');
	$select="SELECT * FROM schedule s, course c
			WHERE s.CourseID=c.CourseID";
	$query=mysqli_query($connection,$select);
	$count=mysqli_num_rows($query);
	if($count>0){
		echo "<table>";
		for($i=0;$i<$count;$i++){
			$data=mysqli_fetch_array($query);
			$CourseID=$data['CourseID'];
		}
	}
 ?>

<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>