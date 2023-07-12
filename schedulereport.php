<?php 
include('connect.php');
 ?>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="schedulereport.php" method="POST">
		<fieldset>
			<legend>Search Option: </legend>
			<table border="1">
				<tr>
					<td>
						<input type="radio" name="rdoSearchType" value="1" checked/>Search by ScheduleID
						<br/>
						<select name="cboScheduleID">
							<option>Choose Schedule</option>
							<?php
								echo $query="SELECT s.*,c.Course_Name,c.Price
								FROM schedule s, course c, coursedetail cd
								WHERE s.ScheduleNo=cd.ScheduleNo
								AND c.CourseID=cd.CourseID";
								$ret=mysqli_query($connection,$query);
								$count=mysqli_num_rows($ret);

								for($i=0;$i<$count;$i++){
									$arr=mysqli_fetch_array($ret);
									$ScheduleNo=$arr['ScheduleNo'];
									$Course_Name=$arr['Course_Name'];
									$Price=$arr['Price'];
									echo"<option value='$ScheduleNo'>".$ScheduleNo."</option>";
								}
							?>
						</select>
					</td>

					<td>
						<input type="radio" name="rdoSearchType" value="2"/>Search by Date
						<br/>
						From:<input type="text" name="txtFrom" value="<?php echo date('Y-m-d')?>" onFocus="showCalendar(calender,this)"/>
						To :<input type="text" name="txtTo" value="<?php echo date('Y-m-d')?>" onFocus="showCalendar(calender,this)"/>

					</td>

					<td>
						<br/>
						<input type="submit" name="btnSearch" value="Search"/>
						<input type="submit" name="btnShowAll" value="ShowAll"/>
						<input type="reset" value="Clear"/>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>