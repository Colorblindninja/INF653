<?php
function get_items_by_category($categoryid) {
	global $db;
	$query = 'SELECT * FROM todoitems
	WHERE todoitems.categoryID = :categoryid ORDER BY itemnum';
	$statement = $db->prepare($query);
	$statement->bindValue(':categoryid', $categoryid); $statement->execute();
	$items = $statement->fetchAll(); $statement->closeCursor(); return $items;
}
function get_item($itemnum) {
	global $db;
	$query = 'SELECT * FROM todoitems WHERE itemnum = :itemnum'; $statement = $db->prepare($query);
	$statement->bindValue(':itemnum', $itemnum); $statement->execute(); $item = $statement->fetch(); $statement->closeCursor(); return $item;
}
function get_all_items() {
	global $db;
	$fetchQuery = 'SELECT * FROM todoitems';
	$statement = $db->prepare($fetchQuery);
	$statement->execute();
	return $statement->fetchAll();
}
function delete_item($itemnum) {
	global $db;
	$query = 'DELETE FROM todoitems
	WHERE itemnum = :itemnum'; $statement = $db->prepare($query);
	$statement->bindValue(':itemnum', $itemnum); $statement->execute(); $statement->closeCursor();
}
function add_item($itemnum, $title, $desc, $categoryid) {
	global $db;
	$query = 'INSERT INTO todoitems (itemnum, title, description, categoryid) VALUES
	(:itemnum, :title, :description, :categoryid)'; $statement = $db->prepare($query);
	$statement->bindValue(':itemnum', $itemnum); $statement->bindValue(':title', $title); $statement->bindValue(':description', $desc); $statement->bindValue(':categoryid', $categoryid); $statement->execute(); $statement->closeCursor();
} ?>
