<?php 
	include('header_V2.php');
	include('connect.php');
	if(isset($_POST['brnregister'])){
		$studentname=$_POST['txtstudentname'];
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
		$dateofbirth=$_POST['txtdateofbirth'];
		$email=$_POST['txtemail'];
		$password=$_POST['txtpassword'];
		$gender=$_POST['txtgender'];
		$nrcno=$_POST['txtnrcno'];
		$parentname=$_POST['txtparentname'];

		$select="SELECT * FROM student WHERE Password='$password' AND Email='$email'";
		$query1=mysqli_query($connection,$select);
		$count=mysqli_num_rows($query1);
		if($count>0){
			echo "<script>alert('duplicate student name and email')</script>";
		}
		else
		{
			$insert="INSERT INTO student(StudentName,Gender,Nrc_no,DateofBirth,Qualification,ParentName,Email,Password,PhoneNumber,Address,StudentProfile)
			VALUES('$studentname','$gender','$nrcno','$dateofbirth','$qualification','$parentname','$email','$password','$phonenumber','$address','$filename')";
			$query=mysqli_query($connection,$insert);
			if($query){
			echo "<script> alert('Student Register Successful')</script>";
		}
	}
	}
 ?>
    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        

        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Student Register</h4>
            <form action="index.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                
                <input type="text" class="form-control" name="txtstudentname" required placeholder="Enter Student Name">
              </div>
              <div class="form-group">

                <td>Gender</td>
				<td class="form-control">
					<select name="txtgender">
						<option>Male</option>
						<option>Female</option>
					</select>
				</td>
              </div>
              <div class="form-group">
                
                <input type="file" class="form-control" name="txtprofile" required placeholder="Enter Profile">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtnrcno" required placeholder="Enter Nrc No">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtdateofbirth" required placeholder="Enter Date of birth">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtqualification" required placeholder="Enter Qualification">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtparentname" required placeholder="Enter Parent Name">
              </div>
              <div class="form-group">
                <input type="emaiil" name="txtemail" class="form-control" required placeholder="Enter Email">
              </div>
              
              <div class="form-group">
                <input type="password" class="form-control" name="txtpassword" required placeholder="Enter Password">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="txtphonenumber" required placeholder="Enter Phone Number">
              </div>
              <div class="form-group">
                <textarea name="txtaddress" id="" cols="30" rows="7" class="form-control" placeholder="Address" required></textarea>
              </div>
              <div class="form-group">
              	<input type="submit" name="brnregister" value="Register" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>


        </div>
      </div>
    </section>

<?php 
include('footer.php');
 ?>