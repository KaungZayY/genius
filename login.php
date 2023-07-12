<?php 
	session_start();
	include('header_V3.php');
	include('connect.php');
	if(isset($_POST['btnsubmit'])){
		$email=$_POST['txtemail'];
		$password=$_POST['txtpassword'];
		$select="SELECT * FROM lecture WHERE email='$email' AND 
		password='$password'";
		$query=mysqli_query($connection,$select);
		$count=mysqli_num_rows($query);
		if($count>0){
			echo "<script>alert('Staff Login successful')
			window.location='lecturehome.php'</script>";
		}
		else{
		$select1="SELECT * FROM student WHERE Email='$email' AND 
		Password='$password'";
		$query1=mysqli_query($connection,$select1);
		$count1=mysqli_num_rows($query1);
		if($count1>0){
			$data=mysqli_fetch_array($query1);
			$_SESSION['SID']=$data['StudentID'];
			$_SESSION['SName']=$data['StudentName'];
			echo "<script>alert('Student Login successful')
			window.location='schedulelisting.php'</script>";
		}
		else{
			echo"<script>alert('Invalid login')
			window.location='login.php'</script>";
		}
		}
	}
 ?>





 <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        

        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Login Form</h4>
            <form action="login.php" method="POST">
              <div class="form-group">
              

                <input type="email" class="form-control" name="txtemail" required placeholder="Enter Email Address">
              </div>
              <div class="form-group">
                <input type="Password"  class="form-control" name="txtpassword" required placeholder="Enter Password">
              </div>
             
              <div class="form-group">
            
                <input type="submit" name="btnsubmit" value="login" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>


        </div>
      </div>
    </section>
<?php 
include('footer.php');
 ?>