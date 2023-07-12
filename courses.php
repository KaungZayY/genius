<?php 
	include('header.php');
	include('connect.php');
	if(isset($_POST['btnsubmit']))
	{
		$coursename=$_POST['txtcoursename'];
		$price=$_POST['txtprice'];
		$select="SELECT * FROM course WHERE Course_Name='$coursename'";
		$query1=mysqli_query($connection,$select);
		$count=mysqli_num_rows($query1);
		if ($count>0) {
			echo "<script>alert('CourseName Duplicated')</script>";
		}
		else{
			$insert="INSERT INTO course (Course_Name,Price) VALUES ('$coursename','$price')";
			$query=mysqli_query($connection, $insert);
			if ($query)
			{
				echo "<script>alert('Course Name Saved')</script>";
			}
		}

	}
	
 ?>

 <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        

        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Course Entry</h4>
            <form action="courses.php" method="POST">
              <div class="form-group">
				<input type="text" class="form-control" name="txtcoursename" required placeholder="Enter Course">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtprice" required placeholder="Price">
              </div>
              <div class="form-group">
       			<input type="submit" class="btn btn-primary py-3 px-5" value="Save" name="btnsubmit">
              </div>
            </form>
          
          </div>
        </div>
      </div>
    </section>
<?php 
include('footer.php');
 ?>