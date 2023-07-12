<?php 
	include('header.php');
	include('connect.php');
	if(isset($_POST['btnsubmit']))
	{
		$roomnumber=$_POST['txtroomnumber'];
		$space=$_POST['txtspace'];
		$select="SELECT * FROM room WHERE RoomNumber='$roomnumber'";
		$query1=mysqli_query($connection,$select);
		$count=mysqli_num_rows($query1);
		if($count>0) 
		{
			echo "<script>alert('Room Name Duplicated')</script>";
		}
		else
		{
			$insert="INSERT INTO room(RoomNumber,Available_space) VALUES('$roomnumber','$space')";
			$query=mysqli_query($connection, $insert);
			if($query)
			{
				echo "<script>alert('Room Saved')</script>";
			}
		}

	}
 ?>


    <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        

        <div class="row block-9">
          <div class="col-md-9 pr-md-5">
          	<h4 class="mb-4">Room Register</h4>
            <form action="room.php" method="POST">
              <div class="form-group">
                <input type="text" name="txtroomnumber" class="form-control" required placeholder="Enter Room Number">
              </div>
              <div class="form-group">
                <input type="text" name="txtspace" class="form-control" required placeholder="Enough space for how much student">
              </div>
              <div class="form-group">
              	<input type="submit" value="Save" class="btn btn-primary py-3 px-5" name="btnsubmit">
                
              </div>
            </form>
          
          </div>


        </div>
      </div>
    </section>

<?php 
include('footer.php');
 ?>