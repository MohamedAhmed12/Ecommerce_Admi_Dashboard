<?php
	/*
	============================================================
	== Manage Memebers Page
	== Add | Edit | Delete Members From Here
	============================================================
	*/

	session_start();

	$pageTitle = 'Members';

	if(isset ($_SESSION['logging'])){	
		
			include 'init.php'; 

			$do = isset($_GET['action']) ? $_GET['action'] : 'Manage';

			// Start Manage Page

			if($do == 'Manage'){ // Manage Mambers Page 

				$reg = '';

				if(isset($_GET['reg']) && $_GET['reg'] == 'pending'){

					$reg = 'AND RegStatus = 0';

				}

				// Select All Users Except Admin

				$stmt = $con->prepare("SELECT 
                                            * 
                                        FROM 
                                            users 
                                        Where GroupID != 1 
                                        $reg
                                        ORDER BY
                                            UserID DESC");

				// Excute The Statment

				$stmt->execute();

				// Assig to Variable

				$rows = $stmt->fetchAll();

				?>

				<h1 class="text-center">Manage Members</h1>
               
                
				<div class="container members">
                   
                    <?php if(!empty($rows)){//if there is members ?>
        
					<div class="panel panel-default">
						<table class=" main-table table table-bordered text-center">
							<thead>
							    <tr>
                                    <td>#ID</td>
                                    <td>Username</td>
                                    <td>Email</td>
                                    <td class='hidden-xs'>Fullname</td>
                                    <td>Registered Date</td>
                                    <td>Control</td>
                                </tr>
							</thead>

							<?php 

							foreach ($rows as $row) {
								echo'<tbody>';
                                    echo"<tr>";
                                        echo"<td>" . $row['UserID'] . "</td>";
                                        echo"<td>" . $row['Username'] . "</td>";
                                        echo"<td class='mail'>" . $row['Email'] . "</td>";
                                        echo"<td class='hidden-xs'>" . $row['Fullname'] . "</td>";
                                        echo"<td>" . $row['Date'] . "</td>";
                                        echo"<td>
                                            <a href='members.php?action=Edit&&userid=" . $row['UserID'] ."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                            <a href='members.php?action=Delete&&userid=" . $row['UserID'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";

                                            if($row['RegStatus'] == 0){

                                                    echo "<a href='members.php?action=Activate&&userid=" . $row['UserID'] ."' class='btn btn-info '><i class='fa fa-okay'></i> Activate</a>";	

                                            }

                                        echo "</td>";
                                    echo"<tr>";
								echo'</tbody>';
							}

							?>

						</table>
                    </div>
                    <!--		End of Table  -->
                    
                     <?php }else{// IF there is no members        
                        echo'<div class="alert alert-danger"> There\'s no record to show</div>';  
                     }?>
                    
                    <!--       Member Button  -->
                    <a href="?action=Add" class="btn btn-primary"><i class="fa fa-plus"></i> New Member</a>
                </div>

		<?php      
                            
                }elseif($do =='Add'){  //Add Members Page ?>

				<h1 class="text-center">Add New Member</h1>

				<div class="container">
					<form class="form-horizontal" action="?action=Insert" method="POST" autocomplete="off">
						<div class="form-group form-group-lg">
							<label class="col-sm-2 col-sm-offset-1 control-label">Username</label>
							<div class="col-sm-7">
									<input type="text" name="username" class="form-control" autocomplete="off" required="required"/>
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 col-sm-offset-1 control-label">Password</label>
							<div class="col-sm-7">
								<input type="password" name="password" class="password form-control" autocomplete="new-password" 
								required="required" placeholder="" />
								<i class="show-pass fa fa-eye fa-2n"></i>
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 col-sm-offset-1 control-label">Email</label>	
							<div class="col-sm-7">
								<input type="email" name="email" class="form-control"  required="required" placeholder="" />
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 col-sm-offset-1 control-label">Full Name</label>
							<div class="col-sm-7">
								<input type="text" name="full" class="form-control" required="required" placeholder="" />
							</div>
						</div>
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-3 col-sm-7">
								<input type="submit" value="Add Member" class="btn btn-primary"/>
							</div>
						</div>
					</form>
				</div>

	  <?php }elseif($do == 'Insert') { // Insert Member Page

				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					
					echo '<h1 class="text-center">Insert Members</h1>';

					echo "<div class='container'>";

					// Get Variables From The Form

					$user 	  = $_POST['username'];
					$pass 	  = $_POST['password'];
					$email 	  = $_POST['email'];
					$name 	  = $_POST['full'];

					$hashPass = sha1($pass);

					// Validation The Form

					$formErros = array();


					if(strlen($user) < 4 && !empty($user)){

						$formErros[] = 'Username Can\'t be less than 4 characters';

					}

					if(strlen($user) > 20){

						$formErros[] = 'Username Can\'t be more than 20 characters';

					}

					if(empty($user)){

						$formErros[] = 'Username Can\'t be empty';

					}

					if(empty($pass)){

						$formErros[] = 'Password Can\'t be empty';

					}

					if(empty($email)){

						$formErros[] = 'Email Can\'t be empty';

					}

					if(empty($name)){

						$formErros[] = 'Fullname Can\'t be empty';

					}

					foreach ($formErros as $error ) {
						echo   '<div class="alert alert-danger">' . $error  . '</div>';
                        redirectHome($msg, 'back');
					}

					// Check If There Is No Error Proced The Update Operation

					if(empty($formErros)){

						// Check If User Exist In Database

						$check = checkItems("Username", "users", $user);

						if($check == 1){

							$msg = '<div class="alert alert-danger">sorry user exists</div>';

							redirectHome($msg, 'back');

						}else{
							
							// Insert This Info In The Database
                            
for($i=0; $i < 100; $i++) {
                            
							$stmt = $con->prepare("INSERT INTO 
													users(Username, Password, Email, Fullname, RegStatus, Date)
												   VALUES
													(:Muser, :Mpass, :Memail, :Mname, 0, now())");

							$stmt->execute(array(

// Using faker to fill the data base
//'Muser'     => $faker->unique()->firstName,
//'Mpass'     => $faker->password,
//'Memail'    => $faker->email,
//'Mname'     => $faker->firstName,
                                
								'Muser'  => $user,
								'Mpass'  => $hashPass,
								'Memail' => $email,
								'Mname'  => $name
                             
							));
          
                    
                        }

							//Echo Success Message
		 
							$msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Inserted</div>';

							redirectHome($msg,'back');
						}
					}

				}else{

					echo '<div class="container"></br>';

					$msg = '<div class="alert alert-danger">Sorry You Can\'t Browse This Page Directly</div>';

					redirectHome($msg);

					echo '</div>';
				}

				echo "</div>";

	  		}elseif($do == 'Edit') { // Edit page 

				// Check If Get Request userid Is Numeric & Get The value Of It 

				$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

				// Select All Data Depend On This ID

				$stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");

				// Excute Query

				$stmt->execute(array($userid));

				// Fetch The Data

				$row   = $stmt->fetch(); // Brings The stmt Data From The Database To Be Ready To echo Or Whatever
				$count = $stmt->rowCount();

				// If There Is ID Show The Form

				if($count > 0 ) { ?>

						<h1 class="text-center">Edit Members</h1>

						<div class="container">
							<form class="form-horizontal" action="?action=Update" method="POST" autocomplete="off">
                               
                                 <!--  Hidden input to send the id to the next page-->
								<input type="hidden" name="userid" value="<?php echo $userid ?>">

								<div class="form-group form-group-lg">
									<label class="col-sm-2 col-sm-offset-1 control-label">Username</label>
									<div class="col-sm-7">
											<input type="text" name="username" class="form-control" value="<?php echo $row['Username']; ?>" autocomplete="off" required="required"/>
									</div>
								</div>
								<div class="form-group form-group-lg">
									<label class="col-sm-2 col-sm-offset-1 control-label">Password</label>
									<div class="col-sm-7">
										<input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>" />
										<input type="password" name="newpassword" class="form-control" autocomplete="new-password" placeholder="Leave Blank If You Don't Want It To Change" />
									</div>
								</div>
								<div class="form-group form-group-lg">
									<label class="col-sm-2 col-sm-offset-1 control-label">Email</label>	
									<div class="col-sm-7">
										<input type="email" name="email" class="form-control" value="<?php echo $row['Email']; ?>" required="required"/>
									</div>
								</div>
								<div class="form-group form-group-lg">
									<label class="col-sm-2 col-sm-offset-1 control-label">Full Name</label>
									<div class="col-sm-7">
										<input type="text" name="full" class="form-control" value="<?php echo $row['Fullname']; ?>"/>
									</div>
								</div>
								<div class="form-group form-group-lg">
									<div class="col-sm-offset-3 col-sm-7">
										<input type="submit" value="save" class="btn btn-primary"/>
									</div>
								</div>
							</form>
						</div>

			<?php 

				// If There Is No Such ID Show Error Message
			
				}else{
					echo "<div class='container'>";

					echo '<br>';

					$msg = '<div class="alert alert-danger">There Is No Such ID</div>';

					redirectHome($msg,'back');

					echo "</div>";

				}
			}elseif($do == 'Update'){ // Update Page

				if($_SERVER['REQUEST_METHOD'] == 'POST'){

					echo '<h1 class="text-center">Update Members</h1>';

					echo "<div class='container'>";

					// Get Variables From The Form

					$id 	= $_POST['userid'];
					$user 	= $_POST['username'];
					$email 	= $_POST['email'];
					$name 	= $_POST['full'];

					// Password Trick

					$pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);

					// Validation The Form

					$formErros = array();


					if(strlen($user) < 4 && !empty($user)){

						$formErros[] = 'Username Can\'t be less than 4 characters';

					}

					if(strlen($user) > 20){

						$formErros[] = 'Username Can\'t be more than 20 characters';

					}

					if(empty($user)){

						$formErros[] = 'Username Can\'t be empty';

					}

					if(empty($pass)){

						$formErros[] = 'Password Can\'t be empty';

					}

					if(empty($email)){

						$formErros[] = 'Email Can\'t be empty';

					}

					if(empty($name)){

						$formErros[] = 'Fullname Can\'t be empty';

					}

					foreach ($formErros as $error ) {
						echo   '<div class="alert alert-danger">' . $error  . '</div>';
					}

					// Check If There Is No Error Proced The Update Operation

					if(empty($formErros)){
                             $stmt=$con->prepare('SELECT
                                                *
                                            FROM
                                                users
                                            WHERE
                                                Username = ?
                                            AND
                                                UserID  != ?');//userid != means user with same name but not same id i.e not same user 

                                $stmt->execute(array($name, $id));

                                $count = $stmt->rowCount();

                                if($count >0){
                                    $msg = '<div class="alert alert-danger">Sorry Name already exists</div>';
                                    redirectHome($msg,'back');

                                }else{
                                    // Update This Info In The Database

                                    $stmt = $con->prepare("UPDATE users SET Username = ?, Email =?, Password = ?, Fullname = ? WHERE UserID = ?");

                                    $stmt->execute(array($user, $email, $pass, $name, $id));

                                    //Echo Success Message

                                    $msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Updated</div>';

                                    redirectHome($msg,'back');

					           }
                    }

				}else{

					echo'<br/>';

					$msg = '<div class="alert alert-danger">Sorry You Can\'t Browse This Page Directly</div>';

					redirectHome($msg);
				}

				echo '</div>';

			}elseif($do == 'Delete'){ // Delete Member Page

				echo '<h1 class="text-center">Delete Members</h1>';

				echo "<div class='container'>";

				// Check If Get Request userid Is Numeric & Get The value Of It 

				$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

				// Select All Data Depend On This ID

				$check = checkItems('UserID', 'users', $userid);

				// If There Is ID Show The Form

				if($check > 0 ) { 

					$stmt = $con->prepare("DELETE From users WHERE UserID = :Muser");
					
					$stmt->bindParam(":Muser", $userid);           // or this way   $stmt->execute(array(
 
                    $stmt->execute();            					              //':Muser' => $userid
						                                                          //));

                    $msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Deleted</div>';

                    redirectHome($msg,'back');

				}else{

					$msg = '<div class="alert alert-danger">there is no such Id</div>';

					redirectHome($msg,'back');

				}

					echo '</div>';

			}elseif($do == 'Activate'){ // Delete Member Page

				echo '<h1 class="text-center">Activate Members</h1>';

				echo "<div class='container'>";

				// Check If Get Request userid Is Numeric & Get The value Of It 

				$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

				// Select All Data Depend On This ID

				$check = checkItems('UserID', 'users', $userid);

				// If There Is ID Show The Form

				if($check > 0 ) { 

					$stmt = $con->prepare("UPDATE users SET Regstatus = 1 WHERE UserID = :Muser");
					
					$stmt->bindParam(":Muser", $userid);           // or this way   $stmt->execute(array(
 
                    $stmt->execute();            					              //':Muser' => $userid
						                                                          //));

                    $msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Activated</div>';

                    redirectHome($msg,'back');

				}else{

					$msg = '<div class="alert alert-danger">there is no such Id</div>';

					redirectHome($msg,'back');

				}

					echo '</div>';

			}

			include $tpl . 'footer.inc';

	}else{

		header('location: index.php');

		exit();

	}