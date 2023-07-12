<?php 
session_start();
include('header.php');
include('connect.php');
include('AutoIDFunction.php');
include('schedulefunction.php');
if(isset($_GET['action']))
{
	$action=$_GET['action'];
	if($action=='add')
	{
		$CourseID=$_GET['cbocourseid'];
		$SubjectID=$_GET['cbosubjectid'];
		$lectureid=$_GET['cbolectureid'];
		$roomid=$_GET['cboroomid'];
		Add($CourseID,$SubjectID,$lectureid,$roomid);
	}
	elseif($action==='remove')
	{
		$CourseID=$_GET['courseid'];
		Remove($CourseID);
	}
	elseif($action=='clearall')
	{
		ClearAll();
	}
}

if(isset($_GET['btnsave'])){
  $scheduleno=$_GET['txtscheduleno'];
  $scheduledate1=$_GET['txtscheduledate'];
  $scheduledate=date("Y-m-d",strtotime($scheduledate1));
  $opendate1=$_GET['txtopendate'];
  $opendate=date("Y-m-d",strtotime($opendate1));
  $time=$_GET['txttime'];
  $description=$_GET['txtdescription'];

  $insert="INSERT INTO schedule(ScheduleNo,ScheduleDate,OpenDate,Time,Description) VALUES('$scheduleno','$scheduledate','$opendate','$time','$description')";
  $query=mysqli_query($connection,$insert);

  $size=count($_SESSION['ScheduleFunction']);
  for($i=0;$i<$size;$i++){
    $courseid=$_SESSION['ScheduleFunction'][$i]['CourseID'];
    $lectureid=$_SESSION['ScheduleFunction'][$i]['lectureid'];
    $roomid=$_SESSION['ScheduleFunction'][$i]['roomid'];
    $subjectid1=$_SESSION['ScheduleFunction'][$i]['SubjectID'];

    $insert_SDetail="INSERT INTO coursedetail(CourseID,ScheduleNo,RoomID,LectureID,SubjectID)
                      VALUES('$courseid','$scheduleno','$lectureid','$roomid','$subjectid1')";
    $ret=mysqli_query($connection,$insert_SDetail);
  }
  if($ret){
    unset($_SESSION['ScheduleFunction']);
    echo "<script>alert('Schedule Complete')</script>";
    echo "<script>location='schedule.php'</script>";
  }
  else{
    echo"<p>Something went wrong: ".mysqli_error($connection)."</p>";
  }


  if($query)
  {
    echo"<script>alert('Schedule Saved successfully')</script>";
  }
}
 ?>
    <html>
    <head> 
</head>
    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        

        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Schedule</h4>

            <form action="schedule.php" method="get">
            	<input type="hidden" name="action" value="add"/>
              <div class="form-group">
                <input type="text" class="form-control" name="txtscheduleno" readonly value="<?php echo AutoID('schedule','ScheduleNo','SCH-',6) ?>">
              </div>
              <div class="form-group">
                
                <input type="date" class="form-control" name="txtscheduledate" value="<?php echo date('Y-m-d') ?>"readonly required placeholder="Enter Schedule Date">
              </div>
              <div class="form-group">
                	<select name="cbolectureid" class="form-control">
						<?php 
							$select="SELECT * FROM lecture";
							$query=mysqli_query($connection,$select);
							$count=mysqli_num_rows($query);
							for($i=0;$i<$count;$i++)
						{
							$data=mysqli_fetch_array($query);
							$lectureid=$data['lectureid'];
							$lecturename=$data['lecturename'];
							echo "<option value='$lectureid'>
								$lecturename
							</option>";
						}
						 ?>
					</select>
              </div>
              <div class="form-group">
                <select name="cboroomid" class="form-control">
						<?php 
							$select="SELECT * FROM room";
							$query=mysqli_query($connection,$select);
							$count=mysqli_num_rows($query);
							for($i=0;$i<$count;$i++)
						{
							$data=mysqli_fetch_array($query);
							$roomid=$data['RoomID'];
							$roomnumber=$data['RoomNumber'];
							echo "<option value='$roomid'>
								$roomnumber
							</option>";
						}
						 ?>
					</select>
              </div>
              <div class="form-group">
                	<select name="cbosubjectid" class="form-control">
					<?php 
							$select="SELECT * FROM subject";
							$query=mysqli_query($connection,$select);
							$count=mysqli_num_rows($query);
							for($i=0;$i<$count;$i++)
						{
							$data=mysqli_fetch_array($query);
							$subjectid=$data['SubjectID'];
							$subjectname=$data['SubjectName'];
							echo "<option value='$subjectid'>
								$subjectname
							</option>";
						}
						 ?>
					</select>
              </div>
              <div class="form-group">
                	<select name="cbocourseid" class="form-control">
					<?php 
							$select="SELECT * FROM course";
							$query=mysqli_query($connection,$select);
							$count=mysqli_num_rows($query);
							for($i=0;$i<$count;$i++)
						{
							$data=mysqli_fetch_array($query);
							$courseid=$data['CourseID'];
							$coursename=$data['Course_Name'];
							echo "<option value='$courseid'>
								$coursename
							</option>";
						}
						 ?>
					</select>
              </div>
              
              <div class="form-group">
                <select name="txttime" class="form-control">
                  <option>7am to 12 pm</option>
                  <option>12:30 pm to 5pm</option>
                </select>
              </div>
              
                
             
              <div class="form-group">
                <input type="submit" name="brnadd" value="Add" class="btn btn-primary py-3 px-5">
              </div>
              <fieldset>
              	<legend>Schedule Detail</legend>
              	<?php 
              	if(!isset($_SESSION['ScheduleFunction'])){
              		echo"<p>No Schedule Record Found.</p>";
              		exit();
              	}

              	?>
              	<table align="center" border="1"cellpadding"3px" id="tableid" class="display">
              		<tr>
              			<th>CourseID</th>
              			<th>LecturerName</th>
              			<th>RoomNumber</td>
              			<th>CourseName</th>
              			<th>SubjectName</th>
              			<th>Action</th>
              		</tr>
              		<?php 
              			$size=count($_SESSION['ScheduleFunction']);
              			for ($i=0;$i<$size;$i++){
              				$CourseID=$_SESSION['ScheduleFunction'][$i]['CourseID'];
              				$CourseName=$_SESSION['ScheduleFunction'][$i]['CourseName'];
              				$LectureName=$_SESSION['ScheduleFunction'][$i]['LectureName'];
              				$RoomNumber=$_SESSION['ScheduleFunction'][$i]['RoomNumber'];
              				$SubjectName=$_SESSION['ScheduleFunction'][$i]['SubjectName'];

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
              				echo"<td>$CourseID</td>";
              				echo"<td>$LectureName</td>";
              				echo"<td>$RoomNumber</td>";
              				echo"<td>$CourseName</td>";
              				echo"<td>$SubjectName</td>";
              				echo"<td><a href='schedule.php?action=remove&courseid=$CourseID'>Remove</a></td>";
              				echo"</tr>";
              			}
                  /*}*/
              		 ?>
                   <tr>
                    <td colspan="7" align="right">
                      <input type="date" class="form-control" name="txtopendate" placeholder="Enter Open Date">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="7"align="right">
                      <textarea  class="form-control" name="txtdescription" rows="4" placeholder="Enter Description"></textarea>
                    </td>
                  </tr>
              		 <tr>
              		 	<td colspan="7" align="right">
              		 		<input type="submit" name="btnsave" value="Save"/> |

              		 		<a href="schedule.php?action=clearall">Clear All</a>
              		 	</td>
              		 </tr>
              	</table>
              </fieldset>
            </form>
          
          </div>


        </div>
      </div>
    </section>
    </html>

<?php 
include('footer.php');
 ?>