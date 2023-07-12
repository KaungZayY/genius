<?php 
	include('header.php');
	include('connect.php');
 ?>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="roomlist.php" method="POST">
 		<fieldset>
 			<legend>Room Listing</legend>
 			<table>
 				<tr>
 					<td>Room Name</td>
 					<td>Room Space</td>
 					<td>Action</td>
 				</tr>
 				<tr>
 					<?php 
 					$select="SELECT * FROM room";
 					$query=mysqli_query($connection, $select);
 					$count=mysqli_num_rows($query);
 					for($i=0;$i<$count;$i++)
 					{
 						$data=mysqli_fetch_array($query);
 						$RoomID=$data['RoomID'];
 						$RoomNumber=$data['RoomNumber'];
 						$Available_space=$data['Available_space'];
 						echo "<tr>
 							<td>$RoomID</td>
 							<td>$RoomNumber</td>
 							<td>$Available_space</td>
 							<td>
 							<a href='roomupdate.php?uit=$RoomID'>Update</a> | 
 							<a href='roomdelete.php?did=$RoomID'>Delete</a>
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