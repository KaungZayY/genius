<?php 
	include('header.php');
	include('connect.php');
	if(isset($_REQUEST['uit'])){
		$RoomID=$_REQUEST['uit'];
		$select="SELECT * FROM room WHERE RoomID='$RoomID'";
		$query=mysqli_query($connection, $select);
		$data=mysqli_fetch_array($query);
		$RoomNumber=$data['RoomNumber'];
		$Available_space=$data['Available_space'];

	}
	if (isset($_POST['btnupdate'])) {
		$RoomID=$_POST['txtRoomID'];
		$RoomNumber=$_POST['txtRoomNumber'];
		$Available_space=$_POST['txtAvailable_space'];
		$update="UPDATE room SET RoomNumber='$RoomNumber',Available_space='$Available_space' WHERE RoomID='$RoomID'";
		$query1=mysqli_query($connection, $update);
		if ($query1) {
			echo "<script>alert('Room Update Successful')
			window.location='roomlist.php'
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
          	<h4 class="mb-4">Update Room</h4>
            <form action="roomupdate.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $RoomNumber ?>" name="txtRoomNumber" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="txtAvailable_space" required value="<?php echo $Available_space ?>">
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