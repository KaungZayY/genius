<?php 
	include('header.php');
	include('connect.php');
	if(isset($_POST['btnsubmit'])){
		$subjectname=$_POST['txtsubjectname'];
		$select="SELECT * FROM Subject WHERE SubjectName='$subjectname'";
		$query1=mysqli_query($connection, $select);
		$count=mysqli_num_rows($query1);
		if ($count>0) {
			echo "<script>
			alert('SubjectName Duplicated')
			</script>";
		}
		else{
			$insert="INSERT INTO subject(SubjectName) VALUES ('$subjectname')";
			$query=mysqli_query($connection,$insert);
			if($query){
			echo "<script>
			alert('Subject Save Successful')
			</script>";
			}
		}
	}
 ?>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        

        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4" align="center">Subject</h4>
            <form action="subject.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" name="txtsubjectname" required placeholder="Enter Subject Name">

              </div>
              <div class="form-group">
                <input type="submit" value="Save" name="btnsubmit"class="btn btn-primary py-3 px-5" >
              </div>
            <table align="center" border="1" width="400px">
 			<tr>
 				<td>Subject ID</td>
 				<td>Subject Name</td>
 				<td>Action</td>
 			</tr>
 			<?php 
 			$select="SELECT * FROM Subject";
 			$query=mysqli_query($connection, $select);
 			$count=mysqli_num_rows($query);
 			for ($i=0; $i < $count; $i++) { 
 				$data=mysqli_fetch_array($query);
 				$subjectid=$data['SubjectID'];
 				$subjectname=$data['SubjectName'];
 				echo "<tr>
 					<td>$subjectid</td>
 					<td>$subjectname</td>
 					<td> <a href='subjectupdate.php?uit=$subjectid'>Update</a>
 						| 
 						<a href='subjectdelete.php?did=$subjectid'>Delete</a> 
 					</td>
 				</tr>
 				";
 			}
 			 ?>
            </table>  
          </div>


        </div>
      </div>
    </section>

 <?php 
include('footer.php');
  ?>