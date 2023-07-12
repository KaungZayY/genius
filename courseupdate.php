<?php 
	include('header.php');
	include('connect.php');
	if(isset($_REQUEST['uit'])){
		$CourseID=$_REQUEST['uit'];
		$select="SELECT * FROM Course WHERE CourseID='$CourseID'";
		$query=mysqli_query($connection, $select);
		$data=mysqli_fetch_array($query);
		$Course_Name=$data['Course_Name'];
		$Price=$data['Price'];

	}
	if (isset($_POST['btnupdate'])) {
		$Cou_ID=$_POST['txtcourseid'];
		$Cou_Name=$_POST['txtcoursename'];
		$Price=$_POST['txtprice'];
		$update="UPDATE course SET Course_Name='$Cou_Name',Price='$cPrice' WHERE CourseID='$Cou_ID'";
		$query1=mysqli_query($connection, $update);
		if ($query1) {
			echo "<script>alert('Course Update Successful')
			window.location='courselist.php'
			</script>";
		}
		else{
			echo "<script>alert('Cannot Update at that movement')
			window.location='roomlist.php'
			</script>";
		}
	}
 ?>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Update Course</h4>
            <form action="courseupdate.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $Course_Name ?>" name="txtcoursename" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtprice" required value="<?php echo $Price ?>">
              </div>
              <div class="form-group">
				<input type="submit" class="btn btn-primary py-3 px-5" value="Update" name="btnupdate">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<?php 
include('footer.php');
 ?>