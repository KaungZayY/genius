<?php 
	include('header.php');
	include('connect.php');
 ?>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="studentlist.php" method="POST">
 		<fieldset>
 			<legend>Students</legend>
 			<table width="700px">
 				<tr>
 					<th>Student ID</th>
 					<th>Student Name</th>
 					<th>Gender</th>
 					<th>Nrc_Number</th>
 					<th>DateofBirth</th>
 					<th>Qualification</th>
 					<th>ParentName</th>
 					<th>Email</th>
 					<th>Password</th>
 					<th>Phone Number</th>
 					<th>Address</th>
 					<th>StudentProfile</th>
 					<th>Action</th>
 				</tr>
 				<tr>
 					<?php 
 					$select="SELECT * FROM student";
 					$query=mysqli_query($connection, $select);
 					$count=mysqli_num_rows($query);
 					for($i=0;$i<$count;$i++)
 					{
 						$data=mysqli_fetch_array($query);
 						$StudentID=$data['StudentID'];
 						$StudentName=$data['StudentName'];
 						$Gender=$data['Gender'];
 						$Nrc_no=$data['Nrc_no'];
 						$DateofBirth=$data['DateofBirth'];
 						$Qualification=$data['Qualification'];
 						$ParentName=$data['ParentName'];
 						$Email=$data['Email'];
 						$Password=$data['Password'];
 						$PhoneNumber=$data['PhoneNumber'];
 						$Address=$data['Address'];
 						$StudentProfile=$data['StudentProfile'];
 						echo "<tr>
 							<td>$StudentID</td>
 							<td>$StudentName</td>
 							<td>$Gender</td>
 							<td>$Nrc_no</td>
 							<td>$DateofBirth</td>
 							<td>$Qualification</td>
 							<td>$ParentName</td>
 							<td>$Email</td>
 							<td>$Password</td>
 							<td>$PhoneNumber</td>
 							<td>$Address</td>
 							<td>$StudentProfile</td>
 							<td>
 							<a href='studentupdate.php?uit=$StudentID'>Update</a> | 
 							<a href='studentdelete.php?did=$StudentID'>Delete</a>
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