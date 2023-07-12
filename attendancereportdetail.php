<?php 
include('connect.php');
include('header.php');
if(isset($_REQUEST['AttendanceNo'])){
	$AttendanceNo=$_REQUEST['AttendanceNo'];
	$select="SELECT ad.*,a.*,s.StudentName FROM student s, attendancedetail ad,attendance a
	WHERE ad.StudentID=s.StudentID
	AND a.AttendanceNo=ad.AttendanceNo
	AND a.AttendanceNo='$AttendanceNo'";
	$query=mysqli_query($connection,$select);
	$count=mysqli_num_rows($query);
	echo "<table>
	<tr>
		<td>Attendance No</td>
		<td>StudentName</td>
		<td>Action</td>
	</tr>";
	if($count>0)
	{
		for ($i=0; $i <$count ; $i++) 
		{ 
			$data=mysqli_fetch_array($query);
			$Attendance=$data['Attendance'];
			$StudentName=$data['StudentName'];
			echo "<tr>
				<td>$AttendanceNo</td>
				<td>$StudentName</td>
				<td>$Attendance</td>
			</tr>";
		}
	}
	echo "</table>";
}
 ?>

<?php
include('footer.php');
?>