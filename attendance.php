<?php 
session_start();
include('connect.php');
include('header.php');
include('AutoIDFunction.php');
include('attendancefunction.php');


if(isset($_GET['action']))
{
	$action=$_GET['action'];
	if($action=='add')
	{
		$AttendanceID=$_GET['txtattendanceid'];
		$AttendanceDate=$_GET['txtattendancedate'];
		$Attendance=$_GET['rdoattendance'];
		$StudentID=$_GET['txtStudentID'];
		$TotalPresent=$_GET['txttotalpresent'];
		$TotalAbsent=$_GET['txttotalabsent'];
		$TotalLeave=$_GET['txttotalleave'];
		$Reason=$_GET['txtreason'];
		Add($AttendanceID,$Attendance,$StudentID,$Reason);
	}
	elseif($action==='remove')
	{
		$StudentID=$_GET['StudentID'];
		Remove($StudentID);
	}
	elseif($action=='clearall')
	{
		ClearAll();
	}
}

if(isset($_GET['btnsave'])){
  $attendanceid=$_GET['txtattendanceid'];
  $attendancedate=$_GET['txtattendancedate'];
  $attendance=$_GET['rdoattendance'];
  $StudentID=$_GET['txtStudentID'];
  $totalpresent=$_GET['txttotalpresent'];
  $totalabsent=$_GET['txttotalabsent'];
  $totalleave=$_GET['txttotalleave'];
  $status='Yes';


  $insert="INSERT INTO attendance(AttendanceNo,AttendanceDate,TotalPresent,TotalAbsent,TotalLeave,Status) 
  VALUES('$attendanceid','$attendancedate','$totalpresent','$totalabsent','$totalleave','$status')";
  $query=mysqli_query($connection,$insert);

  $size=count($_SESSION['attendancefunction']);
  for($i=0;$i<$size;$i++){
    $StudentID=$_SESSION['attendancefunction'][$i]['StudentID'];
    $Reason=$_SESSION['attendancefunction'][$i]['Reason'];
    $Attendance=$_SESSION['attendancefunction'][$i]['Attendance'];

    $insert_SDetail="INSERT INTO attendancedetail(StudentID,AttendanceNo,Reason,Attendance)
                      VALUES('$StudentID','$attendanceid','$Reason','$Attendance')";
    $query=mysqli_query($connection,$insert_SDetail);

    if($Attendance=='P')
    {
        $update="Update attendance SET TotalPresent = TotalPresent+1
        WHERE AttendanceNo='$AttendanceID'";
        $query=mysqli_query($connection,$update);
    }
    else if($Attendance=='L')
    {
        $update="Update attendance SET TotalLeave = TotalLeave+1
        WHERE AttendanceNo='$AttendanceID'";
        $query=mysqli_query($connection,$update);
    }
    else if($Attendance=='A')
    {
        $update="Update attendance SET TotalAbsent = TotalAbsent+1
        WHERE AttendanceNo='$AttendanceID'";
        $query=mysqli_query($connection,$update);
    }
  }
  
  if($query){
    unset($_SESSION['attendancefunction']);
    echo "<script>alert('Attendance Complete')</script>";
    echo "<script>location='attendancedetail.php'</script>";
  }
  else{
    echo"<p>Something went wrong in Attendance: ".mysqli_error($connection)."</p>";
  }
if($query)
  {
    echo"<script>alert('Attendance Saved successfully')</script>";
  }
}

 ?>

<html>
<head>
	<title></title>
</head>
<body>
	<form action="attendance.php" method="GET">
		<input type="hidden" name="action" value="add"/>
		<table>
			<tr>
				<td>Attendance ID</td>
				<td><input type="text" name="txtattendanceid" readonly value="<?php echo AutoID('attendance','AttendanceNo','Att-',6) ?>"></td>
			</tr>
			
			<tr>
				<td>Attendance Date</td>
				<td><input type="date" name="txtattendancedate" readonly value="<?php echo date('Y-m-d') ?>"></td>
			</tr>
			
			<tr>
				<td>Attendance</td>
				<td><input type="radio" name="rdoattendance" value="P" checked>Present
					<input type="radio" name="rdoattendance" value="L">Leave
					<input type="radio" name="rdoattendance" value="A">Absent
				</td>
			</tr>
			<tr>
				<td>Student Name</td>
				<td>
					<?php 
							$select="SELECT distinct s.StudentID,s.StudentName FROM enroll e, student s
							WHERE e.StudentID=s.StudentID";
							$query=mysqli_query($connection,$select);
							$count=mysqli_num_rows($query);
							
						echo"<select Name='txtStudentID'>"; 
						for($i=0;$i<$count;$i++)
						{
							$data=mysqli_fetch_array($query);
							$StudentID=$data['StudentID'];
							$StudentName=$data['StudentName'];
							echo "<option value='$StudentID'>
								$StudentID . $StudentName
							</option>";
						}
						echo "</select>"
						 ?>
				</td>
			</tr>
			
			<tr>
				<td>Reason</td>
				<td><input type="text" name="txtreason"></td>
			</tr>

			
			<tr>
				<td></td>
				<td><input type="submit" name="btnrecord" value="Record"></td>
			</tr>
		</table>
		<fieldset>
              	<legend>Attendance</legend>
              	<?php 
              	if(!isset($_SESSION['attendancefunction'])){
              		echo"<p>No Record Found.</p>";
              		exit();
              	}

              	?>
              	<table align="center" border="1"cellpadding"3px" id="tableid" class="display">
              		<tr>
              			<th>AttendanceID</th>
              			<th>Attendance</th>
              			<th>StudentID</td>
              			<th>StudentName</th>
              			<th>Reason</th>
              			<th>Action</th>
              		</tr>
              		<?php 
              			$size=count($_SESSION['attendancefunction']);
              			for ($i=0;$i<$size;$i++){
              				$AttendanceID=$_SESSION['attendancefunction'][$i]['AttendanceID'];
              				$Attendance=$_SESSION['attendancefunction'][$i]['Attendance'];
              				$StudentID=$_SESSION['attendancefunction'][$i]['StudentID'];
              				$StudentName=$_SESSION['attendancefunction'][$i]['StudentName'];
              				$Reason=$_SESSION['attendancefunction'][$i]['Reason'];
              				

              				/*if ($StudentID>1){
              					$select="SELECT * FROM Student";
              					echo "<script>alert('Duplicated Student Name')</script>";
              				}*/

                      /*echo $select="SELECT * FROM course c,lecture l,room r, subject s
                                WHERE c.CourseName='$CourseName'
                                AND l.LectureName='$LectureName'
                                AND r.RoomNumber='$RoomNumber'
                                AND s.SubjectName='$SubjectName'";
                      $query=mysqli_query($connection,$select);
                      $count=mysqli_num_rows($query);
                      if($count>0){
                        echo "<script>alert('Already Exist')</script>";
                      }
                      else{

*/
              				echo"<tr>";
              				echo"<td>$AttendanceID</td>";
              				echo"<td>$Attendance</td>";
              				echo"<td>$StudentID</td>";
              				echo"<td>$StudentName</td>";
              				echo"<td>$Reason</td>";
              				echo"<td><a href='attendance.php?action=remove&StudentID=$StudentID'>Remove</a></td>";
              				echo"</tr>";
              			}
                  /*}*/
              		 ?>
                   <tr>
				<td>Course Name</td>
				<td colspan=3>
					<select name="cboroomid" class="form-control">
						<?php 
							$select="SELECT distinct Course_Name FROM schedule sch,lecture l, room r, course c, subject s, coursedetail cd
							WHERE sch.ScheduleNo=cd.ScheduleNo
							";
							$query=mysqli_query($connection,$select);
							$count=mysqli_num_rows($query);
							for($i=0;$i<$count;$i++)
						{
							$data=mysqli_fetch_array($query);
							//$ScheduleNo=$data['ScheduleNo'];
							//$RoomNumber=$data['RoomNumber'];
							//$LectureName=$data['LectureName'];
							$Course_Name=$data['Course_Name'];
							//$SubjectName=$data['SubjectName'];
							echo "<option>
								$Course_Name
							</option>";
						}
						 ?>
					</select>
				</td>
				<td colspan=2><textarea  class="form-control" name="txtdescription" rows="4" placeholder="Enter Description"></textarea></td>
			</tr>

			<tr>
				<td>Room Number</td>
				<td>
					<select name="cboroomid" class="form-control">
						<?php 
							$select="SELECT distinct RoomNumber FROM schedule sch,lecture l, room r, course c, subject s, coursedetail cd
							WHERE sch.ScheduleNo=cd.ScheduleNo
							";
							$query=mysqli_query($connection,$select);
							$count=mysqli_num_rows($query);
							for($i=0;$i<$count;$i++)
						{
							$data=mysqli_fetch_array($query);
							//$ScheduleNo=$data['ScheduleNo'];
							$RoomNumber=$data['RoomNumber'];
							//$LectureName=$data['LectureName'];
							//$Course_Name=$data['Course_Name'];
							//$SubjectName=$data['SubjectName'];
							echo "<option>
								$RoomNumber
							</option>";
						}
						 ?>
					</select>
				</td>
			</tr>


                  <tr>
                    <td colspan="7"align="right">
                      
                    </td>
                  </tr>
              		 <tr>
              		 	<td colspan="7" align="right">
              		 		<input type="submit" name="btnsave" value="Save"/> |

              		 		<a href="attendance.php?action=clearall">Clear All</a>
              		 	</td>
              		 </tr>
              	</table>
              </fieldset>
	</form>
</body>
</html>

<?php
include('footer.php')
?>