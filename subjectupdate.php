<?php 
	include('header.php');
	include('connect.php');
	if(isset($_REQUEST['uit'])){
		$SubjectID=$_REQUEST['uit'];
		$select="SELECT * FROM subject WHERE SubjectID='$SubjectID'";
		$query=mysqli_query($connection, $select);
		$data=mysqli_fetch_array($query);
		$SubjectName=$data['SubjectName'];
		

	}
	if (isset($_POST['btnupdate'])) {
		$SubjectID=$_POST['txtsubjectid'];
		$SubjectName=$_POST['txtsubjectname'];
		
		$update="UPDATE subject SET SubjectName='$SubjectName', SubjectID='$SubjectID'";
		$query1=mysqli_query($connection, $update);
		if ($query1) {
			echo "<script>alert('Subject Update Successful')
			window.location='subject.php'
			</script>";
		}
	}
 ?>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Update Subject</h4>
            <form action="subjectupdate.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $SubjectName ?>" name="txtsubjectname" required>
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