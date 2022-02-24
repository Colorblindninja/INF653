<?php
require('model/database.php');
require('model/item_db.php');
require('model/category_db.php');
include 'view/header.php';

if(isset($_POST["deleteType"])) {
    if($_POST["deleteType"] == 'todo') {
      	delete_product($_POST["delete"]);
		include 'view/item_list.php';

  } elseif ($_POST["deleteType"] == 'category') {
  		delete_category($_POST["delete"]);
		include 'view/category_list.php';
  } else {
	  	echo $_POST["deleteType"] . ' ';
	  	echo $_POST["delete"] . ' ';
	 	echo "An error occurred while trying to delete";
  }
} elseif(isset($_POST["submitType"])) {
	if($_POST["submitType"] == 'todo'){
		if(isset($_POST["title"]) && isset($_POST["description"])) {
		  if ($_POST["title"]) {

		  	$inputTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
		  	$inputDescription = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

			add_product(NULL, $inputTitle, $inputDescription, 1);
		  }	elseif (!isset($_POST["delete"]) && !$_POST["title"]) {
		    echo 'Your To Do List item must have at least a title.';
		  }

		}
		include 'view/item_list.php';

	} elseif ($_POST["submitType"] == 'category') {
		if(isset($_POST["name"])) {
			if ($_POST["name"]) {
				$inputName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
				add_category(NULL, $inputName);
			} else {
				echo 'Your Category must have a name.';
			}
		}
		include 'view/category_list.php';
	}
} elseif(isset($_GET["view"])) {
	if($_GET["view"] == 'todo'){
			include 'view/item_list.php';
		} elseif ($_GET["view"] == 'category') {
			include 'view/category_list.php';
		}
} else {
	include 'view/item_list.php';
}
include 'view/footer.php';
?>
