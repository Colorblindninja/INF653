<br><br>

<form class="switchForm" action="index.php" method="get">
<?php
$vehiclePageFooter = '<button type="switch" name="view" value="classes">View/Edit Vehicle Classes</button>
    <button type="switch" name="view" value="makes">View/Edit Vehicle Makes</button>
    <button type="switch" name="view" value="types">View/Edit Vehicle Types</button>';
$classesPageFooter = '<button type="switch" name="view" value="vehicles">View/Edit Vehicle list</button>
	<button type="switch" name="view" value="makes">View/Edit Vehicle Makes</button>
	<button type="switch" name="view" value="types">View/Edit Vehicle Types</button>';
$makePageFooter = '<button type="switch" name="view" value="vehicles">View/Edit Vehicle list</button>
	<button type="switch" name="view" value="classes">View/Edit Vehicle Classes</button>
	<button type="switch" name="view" value="types">View/Edit Vehicle Types</button>';
$typePageFooter = '<button type="switch" name="view" value="vehicles">View/Edit Vehicle list</button>
	<button type="switch" name="view" value="classes">View/Edit Vehicle Classes</button>
	<button type="switch" name="view" value="makes">View/Edit Vehicle Makes</button>';
if(isset($_GET["view"])) {
	if($_GET["view"] == 'classes'){
			echo $classesPageFooter;
		} elseif($_GET["view"] == 'makes'){
            echo $makePageFooter;
  	} elseif($_GET["view"] == 'types'){
            echo $typePageFooter;
  	} else {
        echo $vehiclePageFooter;
		}
} else {
    echo $vehiclePageFooter;
}
?>


</form>
<footer>
<p class="copyright Zippy Used Autos"> </p>
</footer>
</body>
</html>
