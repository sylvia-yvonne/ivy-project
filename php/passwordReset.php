<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ivyproject";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	$token = (rand(1111,9999));

	if(isset($_POST['submit'])){
		if(isset($_POST['email'])){
			$email = trim($_POST['email']);

			$sql = "UPDATE shopperinfo SET passwordReset ='$token' WHERE shopperEmail = '$email'";

			if (mysqli_query($conn, $sql)) {
				$_SESSION['token'] = $token;
				$_SESSION['email'] = $email;
			     header("location: ../mailernew/passwordToken.php");
				}
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
		}

			
?>

<!DOCTYPE html>
<html>
<head>
  <title>Shopper Login</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <link rel="stylesheet" type="text/css" href="../css/shopperLogin.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <style type="text/css">
    .error
    {
      color: #ffff33;
      font-family:Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
      font-size:18px;
      text-transform: capitalize;
    }
  </style>
</head>
<body>
  
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Ivy Designs and Stores</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <h5 class="my-0 mr-md-auto font-weight-normal">Password Reset Page</h5>
    </nav>
    <a class="btn btn-outline-primary" href="html/shopperReg.html">Sign Up</a>
  </div>

  <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="../images/face.png">
        </div>

        <div class="col-12 form-input">
          

          <form action="passwordReset.php" method="POST">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Reset</button>
          </form>
            <br>
        </div>

      </div> 
    </div> 
  </div>  
</body>
</html>