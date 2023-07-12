<?php 
include('header1.php');
include("connect.php");
if(isset($_POST['btnSearch']))
{
	$rdoSearchType=$_POST['rdoSearchType'];
	if($rdoSearchType==1)
	{

		$CourseID=$_POST['cboCourseID'];
		$query="SELECT c.*,s.ScheduleNo, s.OpenDate,s.Time, cd.*
		FROM course c, schedule s, coursedetail cd
		WHERE c.CourseID=cd.CourseID
		AND cd.ScheduleNo=s.ScheduleNo
		AND c.CourseID='$CourseID'";

		$result=mysqli_query($connection,$query);
	}


}
else
{
	$query="SELECT c.*,s.ScheduleNo, s.OpenDate,s.Time, cd.*
	FROM course c, schedule s, coursedetail cd
	WHERE c.CourseID=cd.CourseID
	AND cd.ScheduleNo=s.ScheduleNo";
	$result=mysqli_query($connection,$query);
}

 ?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script> 
	<script type="text/javascript" src="js/jquery-3.1.1.slim.min.js"></script>  
</head>
<body>
<form action="schedulelisting.php" method="POST" >

<script>
$(document).ready( function () {
    $('#tableid').DataTable();
} );
</script>

	<fieldset>
		<legend>Course Listing</legend>
		<table border="1">
			<tr>
				<td>
					<input type="radio" name="rdoSearchType" value="1" checked/> Search By Course
					<br/>
				<select name="cboCourseID">
					<option>Choose CourseID</option>
					<?php 
					$query="SELECT * FROM Course";
					$ret=mysqli_query($connection,$query);
					$count=mysqli_num_rows($ret);

					for($i=0;$i<$count;$i++)
					{
						$arr=mysqli_fetch_array($ret);
						$CourseID=$arr['CourseID'];
						$CourseName=$arr['Course_Name'];

						echo"<option value='$CourseID'>".$CourseName."</option>";
					}
					 ?>
				</td>
				<td><br/>
					<input type="submit" name="btnSearch" value="Search"/>
				<td>
			</tr>
		</table>
	<fieldset>
	<fieldset>
		<legend>Search Result</legend>

		<?php 
		
		$count=mysqli_num_rows($result);

		if($count==0)
		{
			echo"<p>No Record Found</p>";
			exit();
		}
		 ?>
		<table id="tableid" class="display">
			<thead>
				<tr>
					<th>CourseName</th>
					<th>Open Date</th>
					<th>Fees</th>
					<th>Time</th>
					<th>Action</th>
				</tr>
			</thread>
			<tbody>
			<?php 
			for($i=0;$i<$count;$i++)
			{
				$arr=mysqli_fetch_array($result);
				$ScheduleNo=$arr['ScheduleNo'];
				$CourseName=$arr['Course_Name'];
				$OpenDate=$arr['OpenDate'];
				$Fees=$arr['Price'];
				$Time=$arr['Time'];
				$CourseID=$arr['CourseID'];

				echo"<tr>";
				echo"<td>$CourseName</td>";
				echo"<td>$OpenDate</td>";
				echo"<td>$Fees</td>";
				echo"<td>$Time</td>";
				echo"<td><a href='enroll.php?sid=$ScheduleNo&CName=$CourseName&CID=$CourseID&Fees=$Fees'>Enroll</a></td>";
			}
			 ?>
			</tbody>
		</table>
	</fieldset>
</form>

</body>
</html>
<?php 
include('footer.php');
 ?>