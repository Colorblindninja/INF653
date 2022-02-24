<?php
		if(isset($_POST["filtered"])) {
		    if($_POST["filtered"] == 'true') {
					$todoitems = get_items_by_category($_POST["filterCategory"]);
				} else {
						$todoitems = get_all_items();
				}
			} else {
				$todoitems = get_all_items();
			}
		  $categories = get_categories();
			?>

<h4>Category Filter</h4>

		<form class="FilterForm" action="index.php" method="post">
		<label for="insertCategory">Category: </label>

		<select name="filterCategory" id="filterCategory">
			<?php foreach ($categories as $category) : ?>
				<option value="<?php echo $category['categoryID']; ?>"><?php echo $category['categoryName']; ?></option>
			<?php endforeach; ?>

			</select>

		<button type="submit" value="Submit">Submit</button>
		<input type="hidden" name="filtered" value="true">
	</form>

	<form class="clearForm" action="index.php" method="post">
		<button type="submit" value="Submit">Clear Filter</button>
		<input type="hidden" name="filtered" value="false">
	</form>



<header><h1>To Do List</h1></header>
<main>
	</br>
	<?php if(empty($todoitems)) {?>
		<p><span class="bold">The To Do List is empty. Add an item using the form below!</span></p>
	  <?php };?>
	  <?php foreach ($todoitems as $todoitem) : ?>
		  <section>
			<p><span class="bold">Title:</span> <?php echo $todoitem['Title']; ?></p>
			<?php if($todoitem['Description']) {?>
				  <p><span class="bold">Description:</span> <?php echo $todoitem['Description']; ?></p>
			<?php };?>
			<p><span class="bold">Category:</span> <?php echo get_category_name($todoitem['categoryID']); ?></p>
			<form class="DeleteForm" action="index.php" method="post">
			<button type="DeleteButton" name="delete" value=<?php echo $todoitem['ItemNum']; ?>>Delete</button>
			<input type="hidden" name="deleteType" value="todo">
			</form>
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
			<label for="insertCategory">Category: </label>

			<select name="insertCategory" id="insertCategory">
				<?php foreach ($categories as $category) : ?>
					<option value="<?php echo $category['categoryID']; ?>"><?php echo $category['categoryName']; ?></option>
				<?php endforeach; ?>

				</select>
				<br>
	    <button type="submit" value="Submit">Submit</button>
		<input type="hidden" name="submitType" value="todo">

	</form>
<br><br>
	<form class="switchForm" action="index.php" method="get">
	<button type="switch" name="view" value="category">View and Add Categories</button>

	</form>

    </main>
