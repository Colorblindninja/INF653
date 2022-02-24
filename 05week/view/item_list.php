<?php $todoitems = get_all_products();
	  $categories = get_categories();  ?>


</form>
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
	    <button type="submit" value="Submit">Submit</button>
		<input type="hidden" name="submitType" value="todo">
		<select name="insertCategory" id="insertCategory">
			<?php foreach ($categories as $category) : ?>
				<option value="volvo">Volvo</option>

	    </select>
	</form>

	<form class="switchForm" action="index.php" method="get">
	<button type="switch" name="view" value="category">View and Add Categories</button>

	</form>

    </main>
