<?php 
	include('connect.php');
	$select="SELECT * FROM course";
	$ret=mysqli_query($connection,$select);
	$count=mysqli_num_rows($ret);
 ?>
<html>
<head>
	<title>

	</title>
</head>
<body>
	<form action ="schedulelisting.php" method="POST">
		<form action="schedulelisting.php" method="get">

			Class Type Search:
			<input type="text" placeholder="Enter Keyward Here.... " value="<?php
			if(isset($_POST['btnsearch']))
			{
				$SearchData=$_POST['txtsearch'];
				echo $SearchData;
			}
			?>" name="txtsearch" size="10" required>

			<input type="submit" name="btnsearch" value="Search" />
		</form>
		<?php 
			if(isset($_POST['btnsearch'])){
				for($i=0;$i<$count;$i+=4)
					echo"<tr>";
					$subselect="SELECT * FROM course
					WHERE Course_Name LIKE '%$SearchData%' LIMIT $i,4";
					$subret=mysqli_query($connection,$subselect);
					$subcount=mysqli_num_rows($subret);

					for($j=0;$j<$subcount;$j++){
						$row=mysqli_fetch_array($subret);
						echo"<td>";
						echo"<br/>CourseName:".$row['Course_Name']."<br/><br/>
						CourseFee: ".$row['Price']."<br>
						<a href='CourseDetail.php?cn=".$row['Course_Name']."'>View Detail</a>";
					}
					echo"</tr>";
			}
			if(!isset($_POST['btnsearch'])){
				for($i=0;$i<$count;$i+=4)
					echo"<tr>";
					$subselect="SELECT * FROM course LIMIT $i,4";
					$subret=mysqli_query($connection,$subselect);
					$subcount=mysqli_num_rows($subret);

					for($j=0;$j<$subcount;$j++){
						$row=mysqli_fetch_array($subret);
						echo"<td>";
						echo"<br/>CourseName:".$row['Course_Name']."<br/><br/>
						CourseFee: ".$row['Price']."<br>
						<a href='CourseDetail.php?cn=".$row['Course_Name']."'>View Detail</a>";
					}
					echo"</tr>";
			}

		 ?>
		
	</form>

</body>
</html>