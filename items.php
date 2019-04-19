<?php

	/*
	============================================================
	== Template Page
	============================================================
	*/

	ob_start(); // Output Buffering(saving) Start

	session_start();

	$pageTitle = 'Items';

	if(isset ($_SESSION['logging'])){	
		
		include 'init.php'; 

		$do = isset($_GET['action']) ? $_GET['action'] : 'Manage';

		// Start Manage Page

		if($do == 'Manage'){ // Manage items Page 

				// Select All items 

				$stmt = $con->prepare("SELECT 
                                            items.*, categories.Name AS cat_name, users.Username AS member 
                                        FROM 
                                            items

                                        INNER JOIN 
                                            categories 
                                        ON 
                                            categories.ID = items.Cat_ID

                                        INNER JOIN 
                                            users
                                        ON 
                                            users.UserID = items.Member_ID
                                        ORDER BY
                                            item_ID DESC");//inner join the foreign keys with the linked keys 

				// Excute The Statment

				$stmt->execute();

				// Assig to Variable

				$items = $stmt->fetchAll();

				?>

				<h1 class="text-center">Manage Items</h1>
				<div class="container items">
				
                <?php if(!empty($items)){//check if theres are items ?>
				
					<div class="panel panel-default">
						<table class=" main-table table table-bordered text-center">
							<thead>
							    <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Description</td>
                                    <td>Price</td>
                                    <td>Adding Date</td>
                                    <td>Category</td>
                                    <td class='hidden-xs'>User Name</td>
                                    <td>Control</td>
                                </tr>
							</thead>

							<?php 

							foreach ($items as $item) {
								echo'<tbody>';
                                    echo"<tr>";
                                        echo"<td>" . $item['item_ID'] . "</td>";
                                        echo"<td>" . $item['Name'] . "</td>";
                                        echo"<td>" . $item['Description'] . "</td>";
                                        echo"<td>" . $item['Price'] . "</td>";
                                        echo"<td>" . $item['Add_Date'] . "</td>";
                                        echo"<td>" . $item['cat_name'] . "</td>";
                                        echo"<td class='hidden-xs'>" . $item['member'] . "</td>";
                                        echo"<td>
                                            <a href='items.php?action=Edit&&item_ID=" . $item['item_ID'] ."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                            <a href='items.php?action=Delete&&item_ID=" . $item['item_ID'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";
                                            if($item['Approve'] == 0){
                                                echo "<a href='items.php?action=Approve&&item_ID=" . $item['item_ID'] . "' class='btn btn-info'>
                                                        <i class='fa fa-check'></i> Approve
                                                      </a>";
                                            }
                                        echo "</td>";
                                    echo"<tr>";
								echo'</tbody>';
							}

							?>

						</table>
					</div>
                <?php }else{//End of checking if there are items
                  echo'<div class="alert alert-danger">There\'s is no record to show</div>';   
                }?>
					<a href="?action=Add" class="btn btn-add"><i class="fa fa-plus"></i> New Item</a>
				</div>
        <?PHP
		}elseif($do =='Add'){  //Add Members Page ?>
        
			<h1 class="text-center">Add New Item</h1>

			<div class="container">
				<form class="form-horizontal" action="?action=Insert" method="POST">
                    <!--  Start Name Field-->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Name</label>
						<div class="col-sm-7">
								<input type="text" name="name" class="form-control"  placeholder="Name Of Item" />
						</div>
					</div>
                    <!--  End Name Field-->
                    <!--  Start Description Field-->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Description</label>
						<div class="col-sm-7">
								<input type="text" name="description" class="form-control" required="required" placeholder="Description Of Item" />
						</div>
					</div>
                    <!--  End Description Field-->
                    <!--  Start price Field-->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Price</label>
						<div class="col-sm-7">
								<input type="text" name="price" class="form-control" required="required" placeholder="Price Of Item" />
						</div>
					</div>
                    <!--  End price Field-->
                    <!--  Start country Field-->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Country</label>
						<div class="col-sm-7">
								<input type="text" name="country" class="form-control" required="required" placeholder="Country Of Made" />
						</div>
					</div>
                    <!--  End country Field-->
                    <!--  Start status Field-->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Status</label>
						<div class="col-sm-7">
                            <!--   By Using Options here only the values will be sent to database-->
                            <select name="status" > 
                                <option value="0">...</option>
                                <option value="1">New</option>
                                <option value="2">Like New</option>
                                <option value="3">Used</option>
                            </select>
                        </div>
					</div>
                    <!--  End status Field-->
                    <!--  Start member Field-->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Member</label>
						<div class="col-sm-7">
                            <!--   By Using Options here only the values will be sent to database-->
                            <select name="member" > 
                                <option value="0">...</option>
                                <?php
                                    $stmt   = $con->prepare("SELECT * FROM users");
                                    $stmt->execute();
                                    $users  =$stmt->fetchAll();
                                    foreach($users as $user){
                                        echo'<option value="' . $user['UserID'] . '">' . $user['Username'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
					</div>
                    <!--  End member Field-->
                    <!--  Start Categories Field-->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 col-sm-offset-1 control-label">Category</label>
						<div class="col-sm-7">
                            <!--   By Using Options here only the values will be sent to database-->
                            <select name="Category" > 
                                <option value="0">...</option>
                                <?Php
                                    $stmt       = $con->prepare("SELECT *FROM categories");// Select and prepare those coulmns from DB
                                    $stmt->execute();//Excute them
                                    $categories = $stmt->fetchAll();//Fetch them and bring them
                                    foreach($categories as $category){//loop through each one of them
                                        echo'<option value="' . $category['ID'] . '">' . $category['Name'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
					</div>
                    <!--  End Categories Field-->
                    <!--Start SubmitField-->
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-3 col-sm-7">
							<input type="submit" value="Add Item" class="btn btn-primary"/>
						</div>
					</div>
                    <!--End SubmitField-->
				</form>
				
        <?php

		}elseif($do == 'Insert') {  // Insert items Page

				if($_SERVER['REQUEST_METHOD'] == 'POST'){//if redirected to the page through request method
					
					echo '<h1 class="text-center">Insert Items</h1>';

					echo "<div class='container'>";

					// Get Variables From The Form

					$name 	          = $_POST['name'];// name of field in the form post from the form
					$description 	  = $_POST['description'];
					$price 	          = $_POST['price'];
					$country 	      = $_POST['country'];
					$status     	  = $_POST['status'];
					$cat_ID     	  = $_POST['Category'];
					$user_ID     	  = $_POST['member'];

					// Validation The Form

					$formErros = array();


					if(empty($name)){

						$formErros[] = 'Name Can\'t be <strong>empty</strong>';

					}

					if(empty($description)){

						$formErros[] = 'description Can\'t be <strong>empty</strong>';

					}

					if(empty($price)){

						$formErros[] = 'price Can\'t be <strong>empty</strong>';

					}

					if(empty($country)){

						$formErros[] = 'country Can\'t be <strong>empty</strong>';

					}

					if(empty($status)){

						$formErros[] = 'You Must Choose The <strong>Status</strong>';

					}
                    
                    if(empty($user_ID)){

						$formErros[] = 'You Must Choose The <strong>Member</strong>';

					}

                    if(empty($cat_ID)){

						$formErros[] = 'You Must Choose The <strong>Category</strong>';

					}
                    
					foreach ($formErros as $error ) {
						$msg='<div class="alert alert-danger">' . $error  . '</div>';
                        redirectHome($msg, 'back');
					}

					// Check If There Is No Error Proced The Update Operation

					if(empty($formErros)){

for($i=0; $i < 70; $i++) {
                        
                        // Insert This Info In The Database

                        $stmt = $con->prepare("INSERT INTO 
                                                items(Name, Description, Price, Making_Country, Status, Add_Date, Cat_ID, Member_ID)
                                               VALUES
                                                (:Mname, :Mdescription, :Mprice, :MMaking_Country, :Mstatus, now(), :Mcat_ID, :Muser_ID)");

                        $stmt->execute(array(

//                            'Mname'  => $name,
//                            'Mdescription'  => $description,
//                            'Mprice' => $price,
//                            'MMaking_Country' => $country,
//                            'Mstatus' => $status,
//                            'Mcat_ID' => $cat_ID,
//                            'Muser_ID' => $user_ID,
                            
                            'Mname'             => $faker->word,
                            'Mdescription'      => $faker->paragraph(4),
                            'Mprice'            => $faker->numberBetween($min = 10, $max = 1000),
                            'MMaking_Country'     => $faker->country,
                            'Mstatus'     => $faker->numberBetween($min = 1, $max = 3),
                            'Mcat_ID'     => $faker->numberBetween($min = 1, $max = 10),
                            'Muser_ID'     => $faker->numberBetween($min = 1, $max = 100),
                            

                        ));
}
                        //Echo Success Message

                        $msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Inserted</div>';

                        redirectHome($msg,'items.php');
					}

				}else{

					echo '<div class="container"></br>';

					$msg = '<div class="alert alert-danger">Sorry You Can\'t Browse This Page Directly</div>';

					redirectHome($msg); //Redirect to home

					echo '</div>';
				}

				echo "</div>";

		}elseif($do == 'Edit') {// Edit page 
            // Check If Get Request itemid Is Numeric & Get The value Of It 

				$itemid = isset($_GET['item_ID']) && is_numeric($_GET['item_ID']) ? intval($_GET['item_ID']) : 0;

				// Select All Data Depend On This ID

				$stmt = $con->prepare("SELECT * FROM items WHERE item_ID = ?");

				// Excute Query

				$stmt->execute(array($itemid));

				// Fetch The Data

				$item   = $stmt->fetch(); // Brings The stmt Data From The Database To Be Ready To echo Or Whatever
				$count = $stmt->rowCount();

				// If There Is ID Show The Form

				if($count > 0 ) { ?>

                    <h1 class="text-center">Edit Items</h1>
                        
                    <div class="container">
                        <form class="form-horizontal" action="?action=Update" method="POST">
                           
                            <!--  Hidden input to send the id to the next page-->
                            <input type="hidden" name="item_id" value="<?php echo $itemid ?>">
                           
                            <!--  Start Name Field-->
                            <div class="form-group form-group-lg">
                                <label class="col-sm-2 col-sm-offset-1 control-label">Name</label>
                                <div class="col-sm-7">
                                        <input 
                                            type="text" 
                                            name="name" 
                                            class="form-control"  
                                            placeholder="Name Of Item"
                                            value="<?php echo $item['Name']; ?>" />
                                </div>
                            </div>
                            <!--  End Name Field-->
                            <!--  Start Description Field-->
                            <div class="form-group form-group-lg">
                                <label class="col-sm-2 col-sm-offset-1 control-label">Description</label>
                                <div class="col-sm-7">
                                        <input 
                                        type="text" 
                                        name="description" 
                                        class="form-control" 
                                        required="required" 
                                        placeholder="Description Of Item"
                                        value="<?php echo $item['Description']; ?>" />
                                </div>
                            </div>
                            <!--  End Description Field-->
                            <!--  Start price Field-->
                            <div class="form-group form-group-lg">
                                <label class="col-sm-2 col-sm-offset-1 control-label">Price</label>
                                <div class="col-sm-7">
                                        <input 
                                        type="text" 
                                        name="price" 
                                        class="form-control" 
                                        required="required" 
                                        placeholder="Price Of Item" 
                                        value="<?php echo $item['Price']; ?>"/>
                                </div>
                            </div>
                            <!--  End price Field-->
                            <!--  Start country Field-->
                            <div class="form-group form-group-lg">
                                <label class="col-sm-2 col-sm-offset-1 control-label">Country</label>
                                <div class="col-sm-7">
                                        <input 
                                        type="text" 
                                        name="country" 
                                        class="form-control" 
                                        required="required" 
                                        placeholder="Country Of Made" 
                                        value="<?php echo $item['Making_Country']; ?>"/>
                                </div>
                            </div>
                            <!--  End country Field-->
                            <!--  Start status Field-->
                            <div class="form-group form-group-lg">
                                <label class="col-sm-2 col-sm-offset-1 control-label">Status</label>
                                <div class="col-sm-7">
                                    <!--   By Using Options here only the values will be sent to database-->
                                    <select name="status" value="<?php echo $item['Status']; ?>"> 
                                        <option value="0" >...</option>
                                        <option value="1" <?php if($item['Status'] === "1"){echo 'selected';} ?> >New</option>
                                        <option value="2" <?php if($item['Status'] === "2"){echo 'selected';} ?>>Like New</option>
                                        <option value="3" <?php if($item['Status'] === "3"){echo 'selected';} ?>>Used</option>
                                    </select>
                                </div>
                            </div>
                            <!--  End status Field-->
                            <!--  Start member Field-->
                            <div class="form-group form-group-lg">
                                <label class="col-sm-2 col-sm-offset-1 control-label">Member</label>
                                <div class="col-sm-7">
                                    <!--   By Using Options here only the values will be sent to database-->
                                    <select name="member" > 
                                        <option value="0">...</option>
                                        <?php
                                            $stmt   = $con->prepare("SELECT * FROM users");
                                            $stmt->execute();
                                            $users  =$stmt->fetchAll();
                                            foreach($users as $user){
                                                echo'<option value="' . $user['UserID'] . '"';
                                                if($item['Member_ID'] === $user['UserID']){echo 'selected';}
                                                echo '>' . $user['Username'] . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!--  End member Field-->
                            <!--  Start Categories Field-->
                            <div class="form-group form-group-lg">
                                <label class="col-sm-2 col-sm-offset-1 control-label">Category</label>
                                <div class="col-sm-7">
                                    <!--   By Using Options here only the values will be sent to database-->
                                    <select name="Category" > 
                                        <option value="0">...</option>
                                        <?Php
                                            $stmt       = $con->prepare("SELECT *FROM categories");// Select and prepare those coulmns from DB
                                            $stmt->execute();//Excute them
                                            $categories = $stmt->fetchAll();//Fetch them and bring them
                                            foreach($categories as $category){//loop through each one of them
                                                echo '<option value="' . $category['ID'] . '"';
                                                if($item['Cat_ID'] === $category['ID']) {echo 'selected';}
                                                echo '>' . $category['Name'] . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!--  End Categories Field-->
                            <!--Start SubmitField-->
                            <div class="form-group form-group-lg">
                                <div class="col-sm-offset-3 col-sm-7">
                                    <input type="submit" value="Edit Item" class="btn btn-primary"/>
                                </div>
                            </div>
                            <!--End SubmitField-->
                        </form>
                        <?php

                        $stmt = $con->prepare(" SELECT 
                                                    comments.*, users.Username 
                                                FROM 
                                                    comments
                                                INNER JOIN 
                                                    users ON users.UserID = Comments.user_id
                                                WHERE
                                                    item_ID = ?
                                                ");

                        // Excute The Statment

                        $stmt->execute(array($itemid));

                        // Assig to Variable

                        $rows = $stmt->fetchAll();
                                    
                        if(!empty($rows)){ //Start checking for emptiness if
                        ?>

                            <h1 class="text-center">Manage <?php echo $item['Name']; ?> Comments</h1>
                                <div class="table-responsive">
                                    <table class="main-table table table-bordered text-center">
                                        <tr>
                                            <td>Comments</td>
                                            <td>User Name</td>
                                            <td>Registered Date</td>
                                            <td>Control</td>
                                        </tr>

                                        <?php 

                                        foreach ($rows as $row) {
                                            echo"<tr>";
                                                echo"<td>" . $row['Comment'] . "</td>";
                                                echo"<td>" . $row['Username'] . "</td>";
                                                echo"<td>" . $row['C_date'] . "</td>";
                                                echo"<td>
                                                    <a href='comments.php?action=Edit&&comid=" . $row['C_id'] ."' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                                                    <a href='comments.php?action=Delete&&comid=" . $row['C_id'] ."' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete</a>";

                                                    if($row['Status'] == 0){

                                                            echo "<a href='comments.php?action=Approve&&comid=" . $row['C_id'] ."' class='btn btn-info '><i class='fa fa-okay'></i> Activate</a>";	

                                                    }

                                                echo "</td>";
                                            echo"<tr>";
                                        }

                                        ?>

                                    </table>
                                </div>
                            </div>
                        </div> 
                
			    <?php 
                        }//End checking for emptiness if
                            
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

					echo '<h1 class="text-center">Update Items</h1>';

					echo "<div class='container'>";

					// Get Variables From The Form

                    $item_ID         = $_POST['item_id'];
					$name 	         = $_POST['name'];
					$description 	 = $_POST['description'];
					$price 	         = $_POST['price'];
                    $country 	     = $_POST['country'];
                    $status 	     = $_POST['status'];
					$category 	     = $_POST['Category'];
					$member	         = $_POST['member'];

                    
					// Validation The Form

					$formErros = array();


					if(empty($name)){

						$formErros[] = 'Name Can\'t be <strong>empty</strong>';

					}

					if(empty($description)){

						$formErros[] = 'description Can\'t be <strong>empty</strong>';

					}

					if(empty($price)){

						$formErros[] = 'price Can\'t be <strong>empty</strong>';

					}

					if(empty($country)){

						$formErros[] = 'country Can\'t be <strong>empty</strong>';

					}

					if(empty($status)){

						$formErros[] = 'You Must Choose The <strong>Status</strong>';

					}

					foreach ($formErros as $error ) {
						echo   '<div class="alert alert-danger">' . $error  . '</div>';
					}


					// Check If There Is No Error Proced The Update Operation

					if(empty($formErros)){

						// Update This Info In The Database

						$stmt = $con->prepare("UPDATE 
                                                    items
                                               SET 
                                                    Name = ?, Description =?, Price = ?, Making_Country =?, Status = ?, Cat_ID = ?, Member_ID = ?
                                               WHERE 
                                                    item_ID = ?");
							
						$stmt->execute(array(
                            $name, $description, $price, $country, $status, $category,$member,$item_ID
                        ));

						//Echo Success Message
 
						$msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Updated</div>';

						redirectHome($msg,'items.php');

					}

				}else{

					echo'<br/>';				
                    $msg = '<div class="alert alert-danger">Sorry You Can\'t Browse This Page Directly</div>';
					redirectHome($msg);
				}

				echo '</div>';
            
		}elseif($do == 'Delete'){ // Delete Items Page
                    echo '<h1 class="text-center">Delete Items</h1>';

                    echo "<div class='container'>";

                    // Check If Get Request item_ID Is Numeric & Get The value Of It 

                    $itemid = isset($_GET['item_ID']) && is_numeric($_GET['item_ID']) ? intval($_GET['item_ID']) : 0;

                    // Select All Data Depend On This ID

                    $check = checkItems('item_ID', 'items', $itemid);

                    // If There Is ID Show The Form

                    if($check > 0 ) { 

                        $stmt = $con->prepare("DELETE From items WHERE item_ID = :Mitem");

                        $stmt->bindParam(':Mitem', $itemid);         // or this way   $stmt->execute(array(

                        $stmt->execute();            					              //':Muser' => $userid
                                                                                      //));

                        $msg = '<div class="alert alert-success">' . $stmt->rowcount() . ' Record Deleted</div>';

                        redirectHome($msg,'back');

                    }else{

                        $msg = '<div class="alert alert-danger">there is no such Id</div>';

                        redirectHome($msg);

                    }

                        echo '</div>'; 
		}elseif($do == 'Approve'){ // Delete Member Page
            
                echo '<h1 class="text-center">Activate Items</h1>';

				echo "<div class='container'>";

				// Check If Get Request userid Is Numeric & Get The value Of It 

				$itemid = isset($_GET['item_ID']) && is_numeric($_GET['item_ID']) ? intval($_GET['item_ID']) : 0;

				// Select All Data Depend On This ID

				$check = checkItems('item_ID', 'items', $itemid);

				// If There Is ID Show The Form

				if($check > 0 ) { 

					$stmt = $con->prepare("UPDATE 
                                              items 
                                           SET 
                                              Approve = 1 
                                           WHERE 
                                              item_ID = :Mitem");
					
					$stmt->bindParam(":Mitem", $itemid);           // or this way   $stmt->execute(array(
 
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

	ob_end_flush(); // Release The Output

?>

