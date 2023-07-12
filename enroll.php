<?php 
include('header1.php');
session_start();
include("connect.php");
if(isset($_REQUEST['sid'])){
	$ScheduleNo=$_REQUEST['sid'];
	$CourseName=$_REQUEST['CName'];
	$CourseID=$_REQUEST['CID'];
	$Fees=$_REQUEST['Fees'];
}
if(isset($_POST['btnconfirm'])){
	$SID=$_SESSION['SID'];
	$EnrollDate=$_POST['txtenrolldate'];
	$txtscheduleno=$_POST['txtscheduleno'];
	$EnrollStatus="Enroll";

	$insert="INSERT INTO Enroll (EnrollDate,StudentID,ScheduleNo,EnrollStatus)
	VALUES ('$EnrollDate','$SID','$txtscheduleno','$EnrollStatus')";
	$query=mysqli_query($connection,$insert);
	if($query){
		echo "<script>alert('Student Enroll Successful')</script>";
		echo "<script>window.location='schedulelisting.php'</script>";
	}

}
 ?>

    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        

        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Enrollment</h4>
            <form action="enroll.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" name="txtenrolldate" value="<?php echo date('M-d-y') ?>"readonly>
              </div>
              <div class="form-group">
              	<input type="text" name="txtstudentname" class="form-control" value="<?php echo $_SESSION['SName'] ?>">
              </div>
              <div class="form-group">
              	<input type="text" name="txtcoursename" class="form-control" value="<?php echo $CourseName ?>">
              </div>
              <div class="form-group">
              	<input type="text" class="form-control" name="txtfees" value="<?php echo $Fees ?>">
                
              </div>
              <div class="form-group">
              	<input type="submit" name="btnconfirm" value="Confirm" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>


        </div>
      </div>
    </section>


<?php 
include('footer.php');
 ?>