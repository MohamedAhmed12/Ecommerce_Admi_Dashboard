<?php

	/*
	============================================================
    ==  Manage Comments Page
	==  Edit | Delete | Approve Comments From Here
    ============================================================
	*/

	ob_start(); // Output Buffering(saving) Start

	session_start();

	$pageTitle = 'Comments';

	if(isset ($_SESSION['logging'])){	
		
		include 'init.php'; 

		$do = isset($_GET['action']) ? $_GET['action'] : 'Manage';

		// Start Manage Page

		if($do == 'Manage'){ // Manage Mambers Page 

				// Select All Users Except Admin

				$stmt = $con->prepare(" SELECT 
                                            comments.*, users.Username, items.Name AS item 
                                        FROM 
                                            comments
                                        INNER JOIN 
                                            users 
                                        ON 
                                            users.UserID = Comments.user_id
                                        INNER JOIN 
                                            items 
                                        ON 
                                            items.item_ID = Comments.item_id
                                        ORDER BY
                                            C_id DESC
                                        ");

				// Excute The Statment

				$stmt->execute();

				// Assig to Variable

				$comments = $stmt->fetchAll();

				?>

				<h1 class="text-center">Manage Comments</h1>
				<div class="container comments">
				
                    <?php if(!empty($comments)){//if there is members ?>
        
					<div class="panel panel-default">
						<table class=" main-table table table-bordered text-center">
							
							<thead>
                            <tr>
								<td>ID</td>
								<td>Comments</td>
								<td>Item</td>
								<td>User Name</td>
								<td>Registered Date</td>
								<td>Control</td>
							</tr>
							</thead>

							<?php 

							foreach ($comments as $comment) {
								echo'<tbody>';
                                    echo"<tr>";
                                        echo"<td>" . $comment['C_id'] . "</td>";
                                        echo"<td>" . $comment['Comment'] . "</td>";
                                        echo"<td>" . $comment['item'] . "</td>";
                                        echo"<td>" . $comment['Username'] . "</td>";
                                        echo"<td>" . $comment['C_date'] . "</td>";
                                        echo"<td>
                                            <a href='comments.php?action=Edit&&comid=" . $comment['C_id'] ."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                            <a href='comments.php?action=Delete&&comid=" . $comment['C_id'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";

                                            if($comment['Status'] == 0){

                                                    echo "<a href='comments.php?action=Approve&&comid=" . $comment['C_id'] ."' class='btn btn-info '><i class='fa fa-check'></i> Activate</a>";	

                                            }

                                        echo "</td>";
                                    echo"<tr>";
								echo"</tbody>";
							}

							?>

						</table>
					</div>
					<?php }else{// IF there is no comments
                      echo'<div class="alert alert-danger"> There\'s no record to show</div>';     
                          }?>
				</div>
		<?php
            
        }elseif($do == 'Edit') { // Edit page 

				// Check If Get Request userid Is Numeric & Get The value Of It 

				$commentid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;

				// Select All Data Depend On This ID

				$stmt = $con->prepare("SELECT * FROM comments WHERE C_id = ? LIMIT 1");

				// Excute Query

				$stmt->execute(array($commentid));

				// Fetch The Data

				$com   = $stmt->fetch(); // Brings The stmt Data From The Database To Be Ready To echo Or Whatever
				$count = $stmt->rowCount();

				// If There Is ID Show The Form

				if($count > 0 ) { ?>

						<h1 class="text-center">Edit Comments</h1>

						<div class="container">
							<form class="form-horizontal" action="?action=Update" method="POST" autocomplete="off">
                               
                                 <!--  Hidden input to send the id to the next page-->
								<input type="hidden" name="id" value="<?php echo $com['C_id'] ?>">

								<div class="form-group form-group-lg">
									<label class="col-sm-2 col-sm-offset-1 control-label">Comment</label>
									<div class="col-sm-7">
                                        <textarea class="form-control as" name="comment"  onkeyup="auto_grow(this)">
                                            <?php echo $com['Comment']; ?>
                                        </textarea>
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

					$id 	     = $_POST['id'];
					$comment 	 = $_POST['comment'];
						
                        // Update This Info In The Database

						$stmt = $con->prepare("UPDATE 
                                                    comments 
                                              SET 
                                                    Comment = :Mcomment
                                              WHERE 
                                                    C_id = :Mid");
							
						$stmt->execute(array(
                            ':Mcomment'  => $comment,
                            ':Mid'      => $id,
                        ));

						//Echo Success Message
 
						$msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Updated</div>';

						redirectHome($msg,'back');

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

				$comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;

				// Select All Data Depend On This ID

				$check = checkItems('C_id', 'comments', $comid);

				// If There Is ID Show The Form

				if($check > 0 ) { 

					$stmt = $con->prepare("DELETE From 
                                                comments
                                           WHERE 
                                                C_id = :Mid");
					
					$stmt->bindParam(":Mid", $comid);           // or this way   $stmt->execute(array(
 
                    $stmt->execute();            					              //':Muser' => $userid
						                                                          //));

                    $msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Deleted</div>';

                    redirectHome($msg,'back');

				}else{

					$msg = '<div class="alert alert-danger">there is no such Id</div>';

					redirectHome($msg,'back');

				}

					echo '</div>';
                }elseif($do == 'Approve'){ // Delete Member Page
                    
                    echo '<h1 class="text-center">Approve Comments</h1>';

                    echo "<div class='container'>";

                    // Check If Get Request userid Is Numeric & Get The value Of It 

                    $comid = isset($_GET['comid']) && is_numeric($_GET['comid']) ? intval($_GET['comid']) : 0;

                    // Select All Data Depend On This ID

                    $check = checkItems('C_id', 'comments', $comid);

                    // If There Is ID Show The Form

                    if($check > 0 ) { 

                        $stmt = $con->prepare("UPDATE 
                                                    comments
                                               SET 
                                                    Status = 1 
                                               WHERE 
                                                    C_id = :Mid");

                        $stmt->bindParam(":Mid", $comid);           // or this way   $stmt->execute(array(

                        $stmt->execute();            					              //':Muser' => $userid
                                                                                      //));

                        $msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Activated</div>';

                        redirectHome($msg,'comments.php');

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

	ob_end_flush(); // Release The Output

?>