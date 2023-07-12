<?php 
	include('header.php');
	include('connect.php');
 ?>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="lecturelist.php" method="POST">
 		<fieldset>
 			<legend>Lecturers</legend>
 			<table width="700px">
 				<tr>
 					<th>Lecturer ID</th>
 					<th>Lecturer Name</th>
 					<th>Qualification</th>
 					<th>Profile</th>
 					<th>Phone Number</th>
 					<th>Address</th>
 					<th>StartDate</th>
 					<th>Email</th>
 					<th>Password</th>
 					<th>Action</th>
 				</tr>
 				<tr>
 					<?php 
 					$select="SELECT * FROM lecture";
 					$query=mysqli_query($connection, $select);
 					$count=mysqli_num_rows($query);
 					for($i=0;$i<$count;$i++)
 					{
 						$data=mysqli_fetch_array($query);
 						$LectureID=$data['lectureid'];
 						$LectureName=$data['lecturename'];
 						$Qualification=$data['qualification'];
 						$LectureProfile=$data['lectureprofile'];
 						$PhoneNumber=$data['phonenumber'];
 						$Address=$data['address'];
 						$StartDate=$data['startdate'];
 						$Email=$data['email'];
 						$Password=$data['password'];
 						echo "<tr>
 							<td>$LectureID</td>
 							<td>$LectureName</td>
 							<td>$Qualification</td>
 							<td>$LectureProfile</td>
 							<td>$PhoneNumber</td>
 							<td>$Address</td>
 							<td>$StartDate</td>
 							<td>$Email</td>
 							<td>$Password</td>
 							<td>
 							<a href='lectureupdate.php?uit=$LectureID'>Update</a> | 
 							<a href='lecturerdelete.php?did=$LectureID'>Delete</a>
 							</td>
 							</tr>";
 					}
 					 ?>
 				</tr>
 			</table>
 		</fieldset>
 </body>
 </html>
 <?php 
include('footer.php');
  ?>