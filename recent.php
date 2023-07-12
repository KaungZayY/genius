<table>
			<tr>
				<td>Course ID</td>
				<td>Course Name</td>
				<td>Duration</td>
				<td>Fee</td>
			</tr>
			<!--
			<?php 
			$query="SELECT * FROM course";
			$ret=mysqli_query($connection,$query);
			$count=mysqli_num_rows($ret);

			for($c=0;$c<$count;$c+=4){
				$searchquery="SELECT * FROM course LIMIT $c,4";
				$searchret=mysqli_query($connection,$searchquery);
				$searchnum=mysqli_num_rows($searchret);
				echo"<tr>";
				for($d=0;$d<$searchnum;$d++){
					$arr=mysqli_fetch_array($searchret);
					$CourseID=$arr['CourseID'];
					$CourseName=$arr['Course_Name'];
					$Price=$arr['Price'];
					echo"<td>".$CourseID."</td>";
					echo"<td>".$CourseName."</td>";
					echo"<td>".$Price."MMK</td>";
					echo"<td><a href='schedulelisting.php?CourseID=$CourseID'>Show More</a></td>";
				}
				echo"<p></tr>";
			}
			 ?>-->
		</table>