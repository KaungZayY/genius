<?php 
	include('header.php');
	include('connect.php');
 ?>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="courselist.php" method="POST">
 		<fieldset>
 			<legend>Course Listing</legend>
 			<table width="700px">
 				<tr>
 					<th>CourseID</th>
 					<th>Course Name</th>
 					<th>Fees</th>
 					<th>Action</th>
 				</tr>
 				<tr>
 					<?php 
 					$select="SELECT * FROM course";
 					$query=mysqli_query($connection, $select);
 					$count=mysqli_num_rows($query);
 					for($i=0;$i<$count;$i++)
 					{
 						$data=mysqli_fetch_array($query);
 						$CourseID=$data['CourseID'];
 						$Course_Name=$data['Course_Name'];
 						$Price=$data['Price'];
 						echo "<tr>
 							<td>$CourseID</td>
 							<td>$Course_Name</td>
 							<td>$Price</td>
 							<td>
 							<a href='courseupdate.php?uit=$CourseID'>Update</a> | 
 							<a href='coursedelete.php?did=$CourseID'>Delete</a>
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