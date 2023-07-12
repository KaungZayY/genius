<?php 

function Add($CourseID,$SubjectID,$lectureid,$roomid)
{	
	$connection=mysqli_connect("localhost","root","","studentdb");
	$query="SELECT * FROM course c, subject s, lecture l,room r
	WHERE CourseID='$CourseID'
	AND lectureid='$lectureid'
	AND RoomID='$roomid'";
	$ret=mysqli_query($connection,$query);
	$count=mysqli_num_rows($ret);
	if($count<1){
		echo"<p>No Record Found.</p>";
		exit();
	}
	$arr=mysqli_fetch_array($ret);
	$coursename=$arr['Course_Name'];
	$subjectname=$arr['SubjectName'];
	$lecturename=$arr['lecturename'];
	$roomnumber=$arr['RoomNumber'];
	if(isset($_SESSION['ScheduleFunction']))
	{
		$index=IndexOf($CourseID);
		if($index==-1){
			$size=count($_SESSION['ScheduleFunction']);
			$_SESSION['ScheduleFunction'][$size]['CourseID']=$CourseID;
			$_SESSION['ScheduleFunction'][$size]['CourseName']=$coursename;
			$_SESSION['ScheduleFunction'][$size]['LectureName']=$lecturename;
			$_SESSION['ScheduleFunction'][$size]['lectureid']=$lectureid;
			$_SESSION['ScheduleFunction'][$size]['roomid']=$roomid;
			$_SESSION['ScheduleFunction'][$size]['SubjectID']=$SubjectID;
			$_SESSION['ScheduleFunction'][$size]['RoomNumber']=$roomnumber;
			$_SESSION['ScheduleFunction'][$size]['SubjectName']=$subjectname;
		}
	}
	else
	{
		$_SESSION['ScheduleFunction']=array();
		$_SESSION['ScheduleFunction'][0]['CourseID']=$CourseID;
		$_SESSION['ScheduleFunction'][0]['CourseName']=$coursename;
		$_SESSION['ScheduleFunction'][0]['LectureName']=$lecturename;
		$_SESSION['ScheduleFunction'][0]['lectureid']=$lectureid;
		$_SESSION['ScheduleFunction'][0]['roomid']=$roomid;
		$_SESSION['ScheduleFunction'][0]['SubjectID']=$SubjectID;
		$_SESSION['ScheduleFunction'][0]['RoomNumber']=$roomnumber;
		$_SESSION['ScheduleFunction'][0]['SubjectName']=$subjectname;
	}
	echo"<script>window.location='schedule.php'</script>";
}
	function Remove($CourseID){
		$index=IndexOf($CourseID);
		if($index!=-1){
			unset($_SESSION['ScheduleFunction'][$index]);
			echo "<script>window.location='schedule.php'</script>";
		}
	}

	function IndexOf($CourseID)
{
		if(isset($_SESSION['ScheduleFunction'])) //once it was not isset !
	{
		return -1;
	}
	$size=count($_SESSION['ScheduleFunction']);
	if($size==0)
	{
		return -1;
	}
	for($i=0;$i<$size;$i++)
	{
		if($CourseID==$_SESSION['ScheduleFunction'][$i]['CourseID'])
		{
			return $i;
		}
	}
		return -1;
}
 ?>