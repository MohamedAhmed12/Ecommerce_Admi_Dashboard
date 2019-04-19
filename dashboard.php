<?php

    // Output Buffering Start (store page in RAM) till header content load then the dashboard page content load
    // anything sends output even the start session musn't be before ob-start and obgzhandler compress the output before release it to inc speed
	ob_start("ob_gzhandler"); 

	session_start();

	if(isset ($_SESSION['logging'])){

			$pageTitle = 'Dashboard';	
		
			include 'init.php'; 
        
				$usersNumber = 5; // dynamic number to show the latest users 

				$latestUsers = getLatest('*', 'users', 'UserID', $usersNumber, 0); // get the date of latest user registered in array

        
				$itemsNumber = 5; // dynamic number to show the latest users 

				$latestItems = getLatest('*', 'items', 'item_ID', $itemsNumber); // get the date of latest user registered in array
        
				/* Start Dashboard Page */ ?>

				<div class="container home-stats text-center">
					<h1>Dashboard</h1>
					<div class="row">
						<div class="col-md-3">
							<div class="stat st-members">
                                <i class="fa fa-user"></i>
                                <div class="info">
                                    Total Members
								    <span><a href="members.php"><?php echo countItems('UserID', 'users'); ?></a></span>
                                </div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="stat st-pending">
							<i class="fa fa-user-plus"></i>
                                <div class="info">
                                    Pending Members
								    <span><a href="members.php?do=Manage&reg=pending"><?php echo checkItems("RegStatus", "users", 0); ?></a></span>
                                </div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="stat st-items">
                                  <i class="fa fa-tag"></i>
							      <div class="info">
                                   Total Items
								    <span><a href="items.php"><?php echo countItems('item_ID', 'items'); ?></a></span>
                                </div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="stat st-comments">
                                <i class="fa fa-comments"></i>
                                <div class="info">
                                    Total Comments
								    <span><a href="comments.php"><?php echo countItems('C_id', 'comments'); ?></a></span>
                                </div>
							</div>
						</div>
					</div>
				</div>

				<div class="container latest">
					<div class="row">
                       <!--	End the row of latest Users & items-->
						<div class="col-sm-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-user"></i> Latest <?php echo $usersNumber; ?> Registed Users
									<span class="toggle-info pull-right">
									    <i class="fa fa-plus fa-lg"></i>
									</span>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled latest-users">
										<?php

                                        if(!empty($latestUsers)){// if there is items ( items in the latestitems array)
											// Loop To Excute The function LatesUsers By Showing Just The Usernames 

											foreach ($latestUsers as $user) {  

												echo '<li>' 

													. $user['Username'] . 

													// Edit Button

													'<a href="members.php?action=Edit&userid=' . $user['UserID'] . '"

														class="btn btn-success pull-right"><i class="fa fa-edit"> Edit</i></a>';
														
													
													// Activate Button

													if($user['RegStatus'] == 0){

														echo "<a href='members.php?action=Activate&&userid=" . $user['UserID'] ."' class='btn btn-info  pull-right'><i class='fa fa-check'></i> Activate</a>";	

													}

													//

											  	echo '</li>'; 

											}
                                        }else{
                                            echo 'There\'s no records to show';
                                        }?>
									</ul>
								</div>
							</div>
						</div>
                   <!--	Start of latest Items-->
						<div class="col-sm-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-tag"></i> Latest <?php echo $itemsNumber;?> Registered Items
									<span class="toggle-info pull-right">
									    <i class="fa fa-plus fa-lg"></i>
									</span>
								</div>
								<div class="panel-body">
                                    <ul class="list-unstyled latest-items">
                                       <?php
                                        if(!empty($latestItems)){// if there is items ( items in the latestitems array)
                                            // Loop To Excute The function LatestItems By Showing Just The items names

                                             foreach($latestItems as $item){
                                                echo '<li>'
                                                            .$item['Name'].

                                                            // Edit Button 
                                                                    '<a href="items.php?action=Edit&&item_ID=' . $item['item_ID'] . '" 
                                                                    class="btn btn-success pull-right"><i class="fa fa-edit"> Edit</i></a>';

                                                            // Activate Button
                                                            if($item['Approve'] == 0){
                                                                echo'<a href="items.php?action=Approve&&item_ID=' . $item['item_ID'] . '"
                                                                     class="btn btn-info  pull-right"><i class="fa fa-check"></i> Approve</a>';
                                                            }

                                                echo '</li>';
                                             } 
                                        }else{
                                           echo ' There\'s no records to show'; 
                                        }?>
                                    </ul>
								</div>
							</div>
						</div>
					</div>
                   <!--	End the row of latest Users & Items-->
                    <!--	Start the row of latest comments-->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-comment"></i> Latest <?php echo $usersNumber; ?> Comments
                                    <span class="toggle-info pull-right">
                                        <i class="fa fa-plus fa-lg"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <?php

				                    $commentsNumber = 5; // dynamic number to show the latest users    
                                    $stmt = $con->prepare(" SELECT 
                                                                comments.*, users.Username 
                                                            FROM 
                                                                comments
                                                            INNER JOIN 
                                                                users 
                                                            ON 
                                                                users.UserID = Comments.user_id
                                                            ORDER BY 
                                                                C_id DESC
                                                            LIMIT
                                                                $commentsNumber
                                                            ");

                                    // Excute The Statment

                                    $stmt->execute();

                                    // Assig to Variable

                                    $comments = $stmt->fetchAll();

                                    if(!empty($comments)){ //Start checking for emptiness if
                                        foreach($comments as $comment){
                                            echo'<div class="comment-box clearfix">';
                                            echo '<span class="c-member pull-left">' . $comment['Username'] . '</span>';
                                            echo '<span class="comment pull-left">' . $comment['Comment'] . '</span>';
                                            echo'</div>';
                                        }
                                    ?>
                                    
                                    <?php }//End checking for emptiness if ?>
                                </div>
                            </div>
                        </div>
                <!--	End the row of latest comments-->
				</div>

				<?php

				/* End Dashboard Page */

			include $tpl . 'footer.inc';

	}else{

		header('location: index.php');

		exit();

	}

	ob_end_flush();

?>