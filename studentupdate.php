<?php 
	include('header.php');
	include('connect.php');
	if(isset($_REQUEST['uit'])){
		$StudentID=$_REQUEST['uit'];
		$select="SELECT * FROM student WHERE StudentID='$StudentID'";
		$query=mysqli_query($connection, $select);
		$data=mysqli_fetch_array($query);
		$StudentName=$data['StudentName'];
		$Gender=$data['Gender'];
		$Nrc_no=$data['Nrc_no'];
		$DateofBirth=$data['DateofBirth'];
		$Qualification=$data['Qualification'];
		$ParentName=$data['ParentName'];
		$Email=$data['Email'];
		$Password=$data['Password'];
		$PhoneNumber=$data['PhoneNumber'];
		$Address=$data['Address'];
		$StudentProfile=$data['StudentProfile'];

	}
	if (isset($_POST['btnupdate'])) {
		$StID=$_POST['txtstudentid'];
		$StudentName=$_POST['txtStudentName'];
		$Gender=$_POST['txtGender'];
		$Nrc_no=$_POST['txtNrc_no'];
		$DateofBirth=$_POST['txtDateofBirth'];
		$Qualification=$_POST['txtQualification'];
		$ParentName=$_POST['txtParentName'];
		$Email=$_POST['txtEmail'];
		$Password=$_POST['txtPassword'];
		$PhoneNumber=$_POST['txtPhoneNumber'];
		$Address=$_POST['txtAddress'];
		$StudentProfile=$_POST['txtStudentProfile'];
		echo $update="UPDATE student SET StudentName='$StudentName',Gender='$Gender',
		Nrc_no='$Nrc_no',DateofBirth='$DateofBirth',Qualification='$Qualification',ParentName='$ParentName',
		Email='$Email',Password='$Password',PhoneNumber='$PhoneNumber',Address='$Address',StudentProfile='$StudentProfile' 
		WHERE StudentID='$StID'";
		$query1=mysqli_query($connection, $update);
		if ($query1) {
			echo "<script>alert(' Update Successful')
			window.location='studentlist.php'
			</script>";
		}
	}
 ?>
<form action="studentupdate.php" method="POST">
    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        
      	<input type="hidden" value="<?php echo $StudentID?>" name="txtstudentid">
        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Student Update</h4>
            
              <div class="form-group">
				<input type="text" class="form-control" name="txtStudentName" value="<?php echo $StudentName ?>">
              </div>
              <div class="form-group">
    			<input type="text" class="form-control" name="txtGender" value="<?php echo $Gender ?>">
              </div>
              <div class="form-group">
              	<input type="file" class="form-control" name="txtStudentProfile" value="<?php echo $StudentProfile ?>">
                
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtDateofBirth" value="<?php echo $DateofBirth ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtQualification" value="<?php echo $Qualification ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtParentName" value="<?php echo $ParentName ?>">
              </div>
              <div class="form-group">
                <input type="emaiil" class="form-control" name="txtEmail" value="<?php echo $Email ?>">
              </div>
              <div class="form-group">
				<input type="password" class="form-control" name="txtPassword" value="<?php echo $Password ?>">
              </div>
              <div class="form-group">
				<input type="text" class="form-control" name="txtPhoneNumber" value="<?php echo $PhoneNumber ?>">
              </div>
              <div class="form-group">
					<textarea name='txtAddress' cols="30" rows="5" class="form-control" value="<?php echo $Address ?>">
						
					</textarea>
              </div>
              <div class="form-group">
				<input type="text" class="form-control" name="txtNrc_no" value="<?php echo $Nrc_no ?>">
              </div>
              <div class="form-group">
				<input type="submit" class="btn btn-primary py-3 px-5" name="btnupdate" value="Update">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?php 
include('footer.php');
 ?>