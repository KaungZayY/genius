<?php 
function Add($AttendanceID,$Attendance,$StudentID,$Reason)
{	$connection=mysqli_connect("localhost","root","","studentdb");
	$query="SELECT * FROM student
	WHERE StudentID='$StudentID'";
	$ret=mysqli_query($connection,$query);
	$count=mysqli_num_rows($ret);
	if($count<1){
		echo"<p>No Record Found.</p>";
		exit();
	}
	$arr=mysqli_fetch_array($ret);
	$StudentName=$arr['StudentName'];
	
	if(isset($_SESSION['attendancefunction']))
	{
		$index=IndexOf($CourseID);
		if($index==-1){
			$size=count($_SESSION['attendancefunction']);
			$_SESSION['attendancefunction'][$size]['AttendanceID']=$AttendanceID;
			$_SESSION['attendancefunction'][$size]['Attendance']=$Attendance;
			$_SESSION['attendancefunction'][$size]['StudentID']=$StudentID;
			$_SESSION['attendancefunction'][$size]['StudentName']=$StudentName;
			$_SESSION['attendancefunction'][$size]['Reason']=$Reason;
			
			
		}
		/*else{
			$sid=$_SESSION['attendancefunction'][$index]['StudentID'];
			if($sid==$StudentID)
			{
				echo "<script>alert('Duplicated Student Name')</script>";
				echo "<script>window.location='attendance.php'</script>";
			}
		}*/
	}
	else
	{
		$_SESSION['attendancefunction']=array();
		$_SESSION['attendancefunction'][0]['AttendanceID']=$AttendanceID;
		$_SESSION['attendancefunction'][0]['Attendance']=$Attendance;
		$_SESSION['attendancefunction'][0]['StudentID']=$StudentID;
		$_SESSION['attendancefunction'][0]['StudentName']=$StudentName;
		$_SESSION['attendancefunction'][0]['Reason']=$Reason;

	}
	echo"<script>window.location='attendance.php'</script>";
}
	function Remove($StudentID){
		$index=IndexOf($StudentID);
		if($index!=-1){
			unset($_SESSION['attendancefunction'][$index]);
			echo "<script>window.location='attendance.php'</script>";
		}
	}
    
	/*function CalculateTotalPresent()
	{​​​​​
		$totalQty=0;
 		if(!isset($_SESSION['attendancefunction']))
	{​​​​​
		return 0;
	}​​​​​
 	$size=count($_SESSION['attendancefunction']);
 	for ($i=0;$i<$size;$i++)
{​​​​​
	$Attendance=$_SESSION['attendancefunction'][$i]['Attendance'];
	if($Attendance=='P')
	{
		$totalQty=$totalQty + ($Attendance);
	}
}​​​​​
return $totalQty;
}​​​​​*/

	function IndexOf($StudentID)
{
		if(!isset($_SESSION['attendancefunction']))
	{
		return -1;
	}
	$size=count($_SESSION['attendancefunction']);
	if($size==0)
	{
		return -1;
	}
	for($i=0;$i<$size;$i++)
	{
		if($StudentID==$_SESSION['attendancefunction'][$i]['StudentID'])
		{
			return $i;
		}
	}
		return -1;
}
	

 ?>