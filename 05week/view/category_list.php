<?php $categories = get_categories(); ?>
<header><h1>Category List</h1></header>
<h4>WARNING: Deleting a category will delete all associated To Do List Items. </h4>

<main>
	</br>
	<?php if(empty($categories)) {?>
		<p><span class="bold">The Category List is empty. Add an category using the form below!</span></p>
	  <?php };?>
	  <?php foreach ($categories as $category) : ?>
		  <section>
			<p><span class="bold">Category Number:</span> <?php echo $category['categoryID']; ?></p>
			<?php if($category['categoryName']) {?>
				  <p><span class="bold">Category Name:</span> <?php echo $category['categoryName']; ?></p>
			<?php };?>
			<form class="DeleteForm" action="index.php" method="post">
			<button type="DeleteButton" name="delete" value=<?php echo $category['categoryID']; ?>>Delete</button>
			<input type="hidden" name="deleteType" value="category">
			</form>
		  </section>
		  </br>
	  <?php endforeach; ?>
	</br></br>

	<header><h3>Enter New Category</h3></header></br>
	    <form class="InsertForm" action="index.php" method="post">
	    <label for="name">Category Name:</label>
	    <input type="text" name="name"><br><br>
	    <button type="submit" value="Submit">Submit</button>
		<input type="hidden" name="submitType" value="category">

	</form>
	<br><br>
	
	<form class="switchForm" action="index.php" method="get">
	<button type="switch" name="view" value="todo">Go Back to the To Do List</button>

	</form>



    </main>
