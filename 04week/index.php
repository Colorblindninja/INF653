<?php
require('database.php');

if(isset($_POST["delete"])) {
    if($_POST["delete"]) {
      $deleteQuery = 'DELETE FROM todoitems WHERE ItemNum = ' . $_POST["delete"] . ';';
      $statement = $db->prepare($deleteQuery);
      $statement->execute();
      $statement->closeCursor();
    }
}
if(isset($_POST["title"]) && isset($_POST["description"])) {
  if ($_POST["title"]) {

  $inputTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $inputDescription = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

  $insertQuery = 'INSERT INTO todoitems (ItemNum, Title, Description) VALUES (NULL, \'' . $inputTitle .'\' , \'' . $inputDescription . '\'); ';
  $statement = $db->prepare($insertQuery);
  $statement->execute();
  $statement->closeCursor();
  } elseif (!isset($_POST["delete"]) && !$_POST["title"]) {
    echo 'Your To Do List item must have at least a title.';
  }

}

$fetchQuery = 'SELECT ItemNum, title, description FROM todoitems';

$statement = $db->prepare($fetchQuery);
$statement->execute();
$todoitems = $statement->fetchAll();
$statement->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To Do List</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header><h1>To Do List</h1></header>
    <main>
    </br>
          <?php if(empty($todoitems)) {?>
                <p><span class="bold">The To Do List is empty. Add an item using the form below!</span></p>
          <?php };?>
          <?php foreach ($todoitems as $todoitem) : ?>
              <section>
                <p><span class="bold">Title:</span> <?php echo $todoitem['title']; ?></p>
                <?php if($todoitem['description']) {?>
                      <p><span class="bold">Description:</span> <?php echo $todoitem['description']; ?></p>
                <?php };?>
                <form class="DeleteForm" action="index.php" method="post">
                <button type="DeleteButton" name="delete" value=<?php echo $todoitem['ItemNum']; ?>>Delete</button>
              </section>
              </br>

            <?php endforeach; ?>
            </br></br>
          <header><h3>Enter To Do Items Here</h3></header></br>
        <form class="InsertForm" action="index.php" method="post">
          <label for="title">Item Label:</label>
          <input type="text" name="title"><br><br>
          <label for="description">Item Description:</label>
          <input type="text" name="description"><br><br>
          <button type="submit" value="Submit">Submit</button>

        </form>

    </main>
</body>
</html>
