<?php 
	include('header.php');
	include('connect.php');
	if(isset($_POST['brnregister'])){
		$lecturename=$_POST['txtlecturename'];
		$qualification=$_POST['txtqualification'];
//////////////////////////Upload Image//////////////////////////
		$image=$_FILES['txtprofile']['name'];
		$folder="images/";
		$filename=$folder.$image;
		$copied=copy($_FILES['txtprofile']['tmp_name'],$filename);

		if(!$copied){
			echo "<script>
					alert('Cannot Upload Image');
				</script>";
		}
//////////////////////////////////////////////////////////////
		$phonenumber=$_POST['txtphonenumber'];
		$address=$_POST['txtaddress'];
		$startdate=$_POST['txtstartdate'];
		$email=$_POST['txtemail'];
		$password=$_POST['txtpassword'];

		$select="SELECT * FROM lecture WHERE /*lecturename='$lecturename' AND*/ email='$email'";
		$query1=mysqli_query($connection,$select);
		$count=mysqli_num_rows($query1);
		if($count>0){
			echo "<script>alert('duplicate email')</script>";
		}
		else{
			$insert="INSERT INTO lecture(lecturename,qualification,lectureprofile,phonenumber,address,startdate,email,password)
			VALUES('$lecturename','$qualification','$filename','$phonenumber','$address','$startdate','$email','$password')";
			$query=mysqli_query($connection,$insert);
			if($query){
			echo "<script> alert('Lecture Register Successful')</script>";
		}
	}
	}
 ?>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        

        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Lecturer Register</h4>
            <form action="lectureRegister.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
				<input type="text" class="form-control" name="txtlecturename" required placeholder="Enter Lecture Name">
              </div>
              <div class="form-group">
    			<input type="text" class="form-control" name="txtqualification" required placeholder="Enter Qualification">
              </div>
              <div class="form-group">
                <input type="file" class="form-control" name="txtprofile" required placeholder="Enter Profile">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtphonenumber" required placeholder="Enter Phone Number">
              </div>
              <div class="form-group">
					<textarea name='txtaddress' cols="30" rows="5" class="form-control" required>
						
					</textarea>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtstartdate" required placeholder="Enter Start Date">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="txtemail" required placeholder="Enter Email">
              </div>
              <div class="form-group">
				<input type="password" class="form-control" name="txtpassword" required placeholder="Enter Password">
              </div>
              <div class="form-group">
				<input type="submit" class="btn btn-primary py-3 px-5" name="brnregister" value="Register">
              </div>
            </form>
          
          </div>


        </div>
      </div>
    </section>

<?php 
include('footer.php');
 ?>