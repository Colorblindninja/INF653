<?php
function get_categories() {
	global $db;
	$query = 'SELECT * FROM categories ORDER BY categoryID';
	$statement = $db->prepare($query); $statement->execute();
	$categories = $statement->fetchAll(); $statement->closeCursor(); return $categories;
}
function get_category_name($categoryid) {
	global $db;
	$query = 'SELECT * FROM categories WHERE categoryID = :categoryid'; $statement = $db->prepare($query);
	$statement->bindValue(':categoryid', $categoryid); $statement->execute();
	$category = $statement->fetch(); $statement->closeCursor();
	$category_name = $category['categoryName']; return $category_name;
}
function delete_category($categoryid) {
	global $db;
	$query = 'DELETE FROM categories
	WHERE categoryID = :categoryID'; $statement = $db->prepare($query);
	$statement->bindValue(':categoryID', $categoryid); $statement->execute(); $statement->closeCursor();
}
function add_category($categoryid, $categoryName) {
	global $db;
	$query = 'INSERT INTO categories (categoryid, categoryName) VALUES
	(:categoryid, :categoryName)'; $statement = $db->prepare($query);
	$statement->bindValue(':categoryid', $categoryid); $statement->bindValue(':categoryName', $categoryName); $statement->execute(); $statement->closeCursor();
}?>
