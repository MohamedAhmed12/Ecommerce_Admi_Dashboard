<?php

	/*
	============================================================
	== Template Page
	============================================================
	*/

	ob_start(); // Output Buffering(saving) Start

	session_start();

	$pageTitle = 'Categories';

	if(isset ($_SESSION['logging'])){	
		
		include 'init.php'; 

		$do = isset($_GET['action']) ? $_GET['action'] : 'Manage';

		// Start Manage Page

		if($do == 'Manage'){ // Manage Mambers Page 

			$sort = '';

			$sort_array = array('ASC', 'DESC');

			// sorting On The Requset Sort Type

			if(isset ($_GET['sort']) && in_array($_GET['sort'], $sort_array)){

				$sort = $_GET['sort'];

			}
			
			// Select All Categories

			$stmt = $con->prepare("SELECT * FROM categories ORDER BY Arrange $sort");

			// Excute The Statment

			$stmt->execute();

			// Assig to Variable

			$cats = $stmt->fetchAll();?>

			<h1 class="text-center">Manage Categories</h1>
			<div class="container categories">
                            
            <?php if(!empty($cats)){//if there is members ?>

				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-edit"></i>
						Manage Categories
						<div class="option pull-right">
                            <i class="fa fa-sort"></i> Orederring:
							<a href="?sort=ASC" class="<?php if($sort == 'ASC'){echo 'active';} ?>">ASC</a>  <span class="sign">|</span>
							<a href="?sort=DESC" class="<?php if($sort == 'DESC'){echo 'active';} ?>">DESC</a>
                            <i class="fa fa-eye"></i> View:
							<span data-view="classic">Classic</span> <span class="sign">|</span>
                            <span data-view="full" class="active">Full</span>
						</div>
					</div>
					<div class="panel-body">
						
						<?php

							foreach ($cats as $cat) {
								echo'<div class="cat">';
                                    echo '<div class="hidden-buttons">';
                                    echo '<a href="?action=Edit&&catid=' . $cat['ID'] . '" class="btn btn-xs btn-success"><i class="fa fa-edit"></i>Edit</a>';
                                    echo '<a href="?action=Delete&&catid='. $cat['ID'] .'" class="btn btn-xs btn-danger"><i class="fa fa-close"></i>Delete</a>';
                                    echo '</div>';
                                    echo '<h3>' .$cat['Name'] . '</h3>';
                                    echo'<div class="view">';
                                        echo '<p>';
                                            if($cat['Description'] == ''){echo 'No Description Available';}else{echo $cat['Description'];}
                                        echo'</p>';
                                        if($cat['Visibility'] == 0){ echo '<span class="visibility"><i class="fa fa-eye"> Hidden</i></span>';}
                                        if($cat['Allow_Comment'] == 0){ echo '<span class="commentting"><i class="fa fa-close"> Comment Disabled</i></span>';}
                                        if($cat['Allow_Ads'] == 0){ echo '<span class="advertisment"><i class="fa fa-close"> Ads Disabled</span></i>';}
                                    echo'</div>';
								echo'</div>';
								
								echo '<hr/>';
							}

						?>					
					</div>
				</div>
           
          <?php }else{// IF there is no members        
                    echo'<div class="alert alert-danger"> There\'s no record to show</div>';  
                }?>
			
            <!--  Adding Categories Button  -->
            <a href="?action=Add" class="btn btn-add"><i class="fa fa-plus"></i> New Member</a>
			</div>

        <?php
		}elseif($do =='Add'){  //Add Members Page ?>

			<h1 class="text-center">Add New Category</h1>

			<div class="container">
				<form class="form-horizontal" action="?action=Insert" method="POST" autocomplete="off">
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Name</label>
						<div class="col-sm-7">
								<input type="text" name="name" class="form-control" autocomplete="off" required="required" placeholder="Name Of Category" />
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Description</label>
						<div class="col-sm-7">
							<input type="text" name="description" class="form-control" placeholder="Descripe The Category" />
						</div>
					</div>
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Ordering</label>	
						<div class="col-sm-7">
							<input type="text" name="ordering" class="form-control" placeholder="Order Of Arrangement The Category" />
						</div>
					</div>
					<!-- Start Visibility Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Visible</label>
						<div class="col-sm-7">
							<div>
								<input id="vis-yes" type="radio" name="visibility" value="1" checked="checked"/>
								<label for="vis-yes">Yes</label>
							</div>
							<div>
								<input id="vis-no" type="radio" name="visibility" value="0"/>
								<label for="vis-no">No</label>
							</div>
						</div>
					</div>
					<!-- End Visibility Field -->
					<!-- Startcommentting Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Allow Comment</label>
						<div class="col-sm-7">
							<div>
								<input id="com-yes" type="radio" name="commentting" value="1" checked="checked"/>
								<label for="com-yes">Yes</label>
							</div>
							<div>
								<input id="com-no" type="radio" name="commentting" value="0" />
								<label for="com-no">No</label>
							</div>
						</div>
					</div>
					<!-- End commentting Field -->
					<!-- Start Advertising Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Allow Ads</label>
						<div class="col-sm-7">
							<div>
								<input id="ads-yes" type="radio" name="advertising" value="1" checked="checked"/>
								<label for="ads-yes">Yes</label>
							</div>
							<div>
								<input id="ads-no" type="radio" name="advertising" value="0" />
								<label for="ads-no">No</label>
							</div>
						</div>
					</div>
					<!-- End Advertising Field -->
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-3 col-sm-7">
							<input type="submit" value="Add Category" class="btn btn-primary"/>
						</div>
					</div>
				</form>
			</div> 

		<?php

		}elseif($do == 'Insert') { // Insert Member Page

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
					
				echo '<h1 class="text-center">Insert Category</h1>';

				echo "<div class='container'>";

				// Get Variables From The Form

				$name 	  = $_POST['name'];
				$desc 	  = $_POST['description'];
				$order 	  = $_POST['ordering'];
				$visible  = $_POST['visibility'];
				$comment  = $_POST['commentting'];
				$ads      = $_POST['advertising'];

				// Check If There Is No Error Proced The Update Operation

				// Check If Category Exist In Database

				$check = checkItems("Name", "categories", $name);

				if($check == 1){

					$msg = '<div class="alert alert-danger">Sorry This Category Exists</div>';

					redirectHome($msg,'/index.php/categories.php');

				}else{
					
//for($i=0; $i < 10; $i++) {
                    
					// Insert This Info In The Database

					$stmt = $con->prepare("INSERT INTO 
											categories(Name, Description, Arrange, Visibility, Allow_Comment, Allow_Ads)
										   VALUES
											(:Mname, :Mdesc, :Morder, :Mvisible, :Mcomment, :Mads)");

					$stmt->execute(array(
        
//For using faker to create tables
//'Mname'              => $faker->unique()->word,
//'Mdesc'              => $faker->paragraph(4),
//'Morder'             => $faker->numberBetween($min= 1, $max= 10),
//'Mvisible'           => $faker->boolean(50),
//'Mcomment'           => $faker->boolean(50),
//'Mads'               => $faker->boolean(50),

                            'Mname'  	=> $name,
                            'Mdesc'  	=> $desc,
                            'Morder'  	=> $order,
                            'Mvisible'  => $visible,
                            'Mcomment'  => $comment,
                            'Mads' 		=> $ads,

                        
                        
					));
/*}*/
					//Echo Success Message
 
					$msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Inserted</div>';

					redirectHome($msg,'categories.php');
				}
			

			}else{

				echo '<div class="container"></br>';

				$msg = '<div class="alert alert-danger">Sorry You Can\'t Browse This Page Directly</div>';

				redirectHome($msg,'back');

				echo '</div>';
			}

			echo "</div>";


		}elseif($do == 'Edit') {// Edit page

			// Check If Request catir Is Numeric And Get The Value Of It

			$catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? $_GET['catid'] : 0;

			// Select All Data Depend On This ID

			$stmt = $con->prepare("SELECT * FROM categories WHERE ID = ?");

			// Excute Query

			$stmt->execute(array($catid));

			// Fetch The Data

			$cat = $stmt->fetch();

			$count = $stmt->rowcount();

			// If There Is ID Show The Form

			if($count > 0){ ?>

				<h1 class="text-center">Edit Category</h1>
				<div class="container">
					<form class="form-horizontal" action="?action=Update" method="POST">

						<input type="hidden" name="id" value="<?php echo $catid ?>" />
						
						<div class="form-group form-group-lg">
							<label class="col-sm-2 col-sm-offset-1 control-label">Name</label>
							<div class="col-sm-7">
								<input type="text" name="name" class="form-control" required="required"  value="<?php echo $cat['Name']; ?>" />
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 col-sm-offset-1 control-label">Description</label>
							<div class="col-sm-7">
								<input type="text" name="description" class="form-control" value="<?php echo $cat['Description']; ?>" />
							</div>
						</div>
						<div class="form-group form-group-lg">
							<label class="col-sm-2 col-sm-offset-1 control-label">Ordering</label>	
							<div class="col-sm-7">
								<input type="text" name="ordering" class="form-control"  value="<?php echo $cat['Arrange'] ?>" />
							</div>
						</div>
						<!-- Visibility Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 col-sm-offset-1 control-label">Visible</label>
							<div class="col-sm-7">
								<div>
									<input id="vis-yes" type="radio" name="visibility" value="1" <?php if($cat['Visibility'] == 1){echo 'checked';} ?>/>
									<label for="vis-yes">Yes</label>
								</div>
								<div>
									<input id="vis-no" type="radio" name="visibility" value="0" <?php if($cat['Visibility'] == 0){echo 'checked';} ?>/>
									<label for="vis-no">No</label>
								</div>
							</div>
						</div>
						<!-- Visibility Field -->
						<!-- commentting Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 col-sm-offset-1 control-label">Allow Comment</label>
							<div class="col-sm-7">
								<div>
									<input id="com-yes" type="radio" name="commentting" value="1" <?php if($cat['Visibility'] == 1){echo 'checked';} ?>/>
									<label for="com-yes">Yes</label>
								</div>
								<div>
									<input id="com-no" type="radio" name="commentting" value="0" <?php if($cat['Visibility'] == 0){echo 'checked';} ?>/>
									<label for="com-no">No</label>
								</div>
							</div>
						</div>
						<!-- commentting Field -->
						<!-- Advertising Field -->
						<div class="form-group form-group-lg">
							<label class="col-sm-2 col-sm-offset-1 control-label">Allow Ads</label>
							<div class="col-sm-7">
								<div>
									<input id="ads-yes" type="radio" name="advertising" value="1" <?php if($cat['Visibility'] == 1){echo 'checked';} ?>/>
									<label for="ads-yes">Yes</label>
								</div>
								<div>
									<input id="ads-no" type="radio" name="advertising" value="0" <?php if($cat['Visibility'] == 0){echo 'checked';} ?>/>
									<label for="ads-no">No</label>
								</div>
							</div>
						</div>
						<!-- Advertising Field -->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-3 col-sm-7">
								<input type="submit" value="Update" class="btn btn-primary"/>
							</div>
						</div>
					</form>
				</div> 

			<?php

			}else{

				echo '<div  class="container">';

				echo '</br>';

				$msg = '<div class="alert alert-danger">There Is No Such ID</div>';
				
				redirectHome($msg,'back');
				
				echo '</div';

			}

		}elseif($do == 'Update'){ // Update Page

			if($_SERVER['REQUEST_METHOD'] == 'POST'){

				echo '<h1 class="text-center">Update Members</h1>';

				echo "<div class='container'>";

				// Get Variables From The Form

				$id 		= $_POST['id'];
				$name		= $_POST['name'];
				$desc		= $_POST['description'];
				$order 		= $_POST['Arrange'];
				$visible 	= $_POST['visibility'];
				$comment    = $_POST['commentting'];
				$ads 		= $_POST['advertising'];

				// Update This Info In The Database

				$stmt = $con->prepare("UPDATE 
											categories 
										SET  
											Name = ?, 
											Description =?, 
											Arrange = ?, 
											Visibility = ?, 
											Allow_Comment = ?,
											Allow_Ads = ?
										WHERE 
											ID = ?");
					
				$stmt->execute(array($name, $desc, $order, $visible, $comment, $ads, $id));	

				//Echo Success Message

				$msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Updated</div>';

				redirectHome($msg, 'categories.php');


			}else{

				echo'<br/>';

				$msg = '<div class="alert alert-danger">Sorry You Can\'t Browse This Page Directly</div>';

				redirectHome($msg);
			}

			echo '</div>';


		}elseif($do == 'Delete'){ // Delete Member Page
            echo '<h1 class="text-center">Delete Categories</h1>';

				echo "<div class='container'>";

				// Check If Get Request userid Is Numeric & Get The value Of It 

				$catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;

				// Select All Data Depend On This ID

				$check = checkItems('ID', 'categories', $catid);

				// If There Is ID Show The Form

				if($check > 0 ) { 

					$stmt = $con->prepare("DELETE From categories WHERE ID = :Mid");
					
                    
					/**
                    *I bind the parameter which I create (Muser) with variable => I use this method to prevent sql injections security issues
                    *other way to do it with associated array
                    *$stmt->execute(array(
                    *   ':Muser' => $userid
                    *));
                    */
                    $stmt->bindParam(":Mid", $catid);          
 
                    $stmt->execute();            					           

                    $msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Deleted</div>';

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

	ob_end_flush(); // Release The Output

?>

