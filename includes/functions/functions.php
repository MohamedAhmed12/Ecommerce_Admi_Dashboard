<?php

	/*
	** Title Function V1.0
	** Title Function That Echo The Page Title In Case The Page
	** Has The Variabe $PageTitle And Echo Defult Title For Other Pages
	*/

	function getTitle(){

		global $pageTitle;

		if(isset($pageTitle)){

			echo $pageTitle;

		}else{

			echo 'Default';

		}

	}

	/*
	**Redirect Function v2.0
	**Redirect Function [ This Function Accepts Parameters]
	**$Msg = Echo The Message [Error | Success | Warning]
	**url = link I will Redirect To
	**$sec = Seconds Before Redirect
	*/

	function redirectHome($msg, $url = null ,$sec = 3){

        if($url === null){//no url to direct to so it will redirect to the home page

            $url  = 'index.php';

            $link = 'Home Page'; 

        }elseif(strpos($url, 'php') !== false){
            //if url to direct to has word "php" in it(find its position by strpos) so it is found & will direct to it(like: items.php)

            $url = $url;

            $link = 'Previous Page';

        }else{// URL doesn't have "php" word in it so it's spam and I will redirect to previous page

            $url = isset( $_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''? $_SERVER['HTTP_REFERER'] : $url = 'index.php';

            $url == 'index.php' ? $link = 'Home Page' : $link = 'Previous Page';
        }

        echo $msg;

        echo "<div class='alert alert-info'>You Will Be Redirected To $link Please Wait...</div>";

        header("refresh:$sec; url=$url");

        exit();
	}

	/*
	**Check Items Function v1.0
	**Function To Check Items In Database[ Function Accept Parameters]
	**$selected = Items To Select[ Example: users, item, category]
	**$from   = Table To Select From[Example: users, items, category]
	**$value  = Value Of Slected to distinguise the row I need [Example: Mohamed, 1, ] 
	*/
		
	function checkItems($selected, $table, $value){

		global $con;

		$stmt2 = $con->prepare("SELECT $selected FROM $table WHERE $selected = ?");

		$stmt2->execute(array($value));

		$count = $stmt2->rowCount();

		return $count;

	}

	/*
	** Count Number Of Items Function V1.0
	** Function To Count NUmber OF Items' Rows
	** $items = Items To Be Count
	** $table =  Table To Choose From
	*/

	function countItems($items, $table){

		global $con;

		$stmt2 = $con->prepare("SELECT COUNT($items) FROM $table");
				
		$stmt2->execute();

		return $stmt2->fetchColumn();

	}

	/*
	** Get Latest Records Function V1.0
	** Function To Get Latest Items From Database [Users, Items, Comments]
	** $selected = Field To Select
	** $table = The Table To Choose From
	** $order = The Thing We Ordering With Respect To
	** $limit = Number Of Limits To Get
	*/

	function getLatest($selected, $table, $order, $limit = 5, $group_id ='NULL'){
        
        global $con;
        
        if($group_id == '0'){//check for the users table to select all except the admin

            $stmt2 = $con->prepare("SELECT
                                        $selected 
                                    FROM 
                                        $table
                                    WHERE
                                        GroupID = $group_id
                                    ORDER BY 
                                        $order 
                                    DESC LIMIT 
                                        $limit
                                    ");
        }else{
             $stmt2 = $con->prepare("SELECT
                                        $selected 
                                    FROM 
                                        $table
                                    ORDER BY 
                                        $order 
                                    DESC LIMIT 
                                        $limit
                                    ");
        }
           
            $stmt2->execute();
           
            $rows = $stmt2->fetchAll();

            return $rows;
        
	}