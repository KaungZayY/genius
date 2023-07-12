<?php 
	include('header.php');
	include('connect.php');
	if(isset($_REQUEST['uit'])){
		$lectureid=$_REQUEST['uit'];
		$select="SELECT * FROM lecture WHERE lectureid='$lectureid'";
		$query=mysqli_query($connection, $select);
		$data=mysqli_fetch_array($query);
		$lecturename=$data['lecturename'];
		$qualification=$data['qualification'];
		$lectureprofile=$data['lectureprofile'];
		$phonenumber=$data['phonenumber'];
		$address=$data['address'];
		$startdate=$data['startdate'];
		$email=$data['email'];
		$password=$data['password'];

	}
	if (isset($_POST['btnupdate'])) {
		$lectureid=$_POST['txtlectureid'];
		$lecturename=$_POST['txtlecturename'];
		$qualification=$_POST['txtqualification'];
		$lectureprofile=$_POST['txtlectureprofile'];
		$phonenumber=$_POST['txtphonenumber'];
		$address=$_POST['txtaddress'];
		$startdate=$_POST['txtstartdate'];
		$email=$_POST['txtemail'];
		$password=$_POST['txtpassword'];
		$update="UPDATE lecture SET lecturename='$lecturename',qualification='$qualification',
		lectureprofile='$lectureprofile',phonenumber='$phonenumber',address='$address',startdate='$startdate',
		email='$email',password='$password' WHERE lectureid='$lectureid'";
		$query1=mysqli_query($connection, $update);
		if ($query1) {
			echo "<script>alert(' Update Successful')
			window.location='lecturelist.php'
			</script>";
		}
	}
 ?>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        
      	<input type="hidden" value="<?php echo $lectureid?>" name="txtlectureid">
        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Lecturer Update</h4>
            <form action="lectureupdate.php" method="POST">
              <div class="form-group">
				<input type="text" class="form-control" name="txtlecturename" value="<?php echo $lecturename ?>">
              </div>
              <div class="form-group">
    			<input type="text" class="form-control" name="txtqualification" value="<?php echo $qualification ?>">
              </div>
              <div class="form-group">
                <input type="file" class="form-control" name="txtprofile" value="<?php echo $lectureprofile ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtphonenumber" value="<?php echo $phonenumber ?>">
              </div>
              <div class="form-group">
					<textarea name='txtaddress' cols="30" rows="5" class="form-control" value="<?php echo $address ?>">
						
					</textarea>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtstartdate" value="<?php echo $startdate ?>">
              </div>
              <div class="form-group">
                <input type="emaiil" class="form-control" name="txtemail" value="<?php echo $email ?>">
              </div>
              <div class="form-group">
				<input type="password" class="form-control" name="txtpassword" value="<?php echo $password ?>">
              </div>
              <div class="form-group">
				<input type="submit" class="btn btn-primary py-3 px-5" name="brnupdate" value="Update">
              </div>
            </form>
          
          </div>


        </div>
      </div>
    </section>
<?php 
include('footer.php');
 ?>