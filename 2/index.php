


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 2</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php
    if(isset($_GET["firstname"]) && isset($_GET["lastname"]) && isset($_GET["age"])) {

      $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
      $lastname = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
      $age = filter_input(INPUT_GET, 'age', FILTER_SANITIZE_NUMBER_INT);

      if(!empty($firstname) && !empty($lastname) && !empty($age)) {


        echo "Hello, my name is " . $firstname . " " . $lastname . ".". "<br>";

        if ($age>0) {
          $ageStatement = "I am " . strval($age) . " years old and ";
          if ($age<18) {
            echo $ageStatement . "I am not old enough to vote in the United States.". "<br>";
          } else {
            echo $ageStatement . "I am old enough to vote in the United States.". "<br>";
          }

          echo $age . " years is " . $age*365 . " days.". "<br>";

        } else {
          echo "Age cannot be negative.". "<br>";
        }


      } else {
        echo "You must have data for firstname, lastname, and age parameters". "<br>";
      }
    } else {
      echo "You must set firstname, lastname, and age parameters. ". "<br>";
    }

    echo "Today is " . date("m/d/Y"). "<br>";

    ?>
  </body>
</html>
