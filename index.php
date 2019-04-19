<?php
	session_start();
	$noNavbar = '';
 	$pageTitle = 'Login';
	include "init.php";
    
    if(isset($_SESSION['logging'] )){// if user already logged in   
        header('location: dashboard.php');
	}

	// Check If User Coming From HTTP Post Request 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$username = $_POST['user'];
			$password = $_POST['pass'];
			$hashedPass = sha1($password);

			// Check If User Exist In Database

			$stmt = $con->prepare("SELECT 
										UserID, Username, Password,Fullname 
									 FROM 
									 	users 
									 WHERE 
									 	Username = ? 
									 AND
									 	Password = ? 
									 AND 
									 	GroupID = 1
									 LIMIT 1");
			
			$stmt->execute(array($username, $hashedPass));
			$row   = $stmt->fetch(); // Brings The stmt Data From The Database To Be Ready To echo Or Whatever
			$count = $stmt->rowCount();
			// If Count > 0 This Means The Database Contain Information About This Username
			if($count > 0){

				$_SESSION['logging'] = $row['Fullname']; // Register Session Name
				$_SESSION['ID'] = $row['UserID']; // Register Session User ID
				header('location: dashboard.php'); // Redirect to Dashboard Page
				exit();	

			}
	}
?>

<!--   Start Login Form Html -->
<form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <h4 class="text-center bold">Admin Login</h4>
    <input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off"/>
    <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password"/>
    <input class="btn  btn-add btn-block" type="submit" value="login"/>
</form>

<?php
	include $tpl . 'footer.inc';
?>