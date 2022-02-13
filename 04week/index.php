<?php
require('database.php');


if(isset($_POST["title"]) && isset($_POST["description"])) {

  $inputTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $inputDescription = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

  $insertQuery = 'INSERT INTO todoitems (ItemNum, Title, Description) VALUES (NULL, \'' . $inputTitle .'\' , \'' . $inputDescription . '\'); ';
  $statement = $db->prepare($insertQuery);
  $statement->execute();
  $statement->closeCursor();
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

<!-- the body section -->
<body>
    <header><h1>To Do List</h1></header>
    <main>
            <?php foreach ($todoitems as $todoitem) : ?>
              <section>
                <p><span class="bold">Title:</span> <?php echo $todoitem['ItemNum']; ?></p>
                <p><span class="bold">Title:</span> <?php echo $todoitem['title']; ?></p>
                <p><span class="bold">Description:</span> <?php echo $todoitem['description']; ?></p>
                <form class="DeleteForm" action="index.php" method="post">
                <button type="DeleteButton" name=delete<?php echo $todoitem['ItemNum']; ?> value=<?php echo $todoitem['ItemNum']; ?>>Delete</button>
              </section>

            <?php endforeach; ?>
      <section>

        <form class="InsertForm" action="index.php" method="post">
          <label for="title">Item Label:</label>
          <input type="text" name="title"><br><br>
          <label for="description">Item Description:</label>
          <input type="text" name="description"><br><br>
          <button type="submit" value="Submit">Submit</button>

        </form>
      </section>

    </main>
</body>
</html>
