<?php
		require('config/db.php');
		require('process.php');
		
		 
		$query = "SELECT jobs.*, categories.name AS cname
				FROM jobs
				INNER JOIN categories
				ON jobs.category_id = categories.id
				ORDER BY post_date DESC
				";

		$result = mysqli_query($conn, $query);
		$catjobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);	
		mysqli_close($conn);


?>
			<?php include ('inc/header.php'); ?>
		      <div class="jumbotron">
		        <h1>Find A Job</h1>
		        	<form method="POST" action="process.php">
		        		<select name="category" class="form-control">
		        			<option value="0">Choose Category</option>
		        			<?php foreach($getcats as $getcat): ?>
		        				<option value="<?php echo $getcat['id']; ?>"><?php echo $getcat['name']; ?></option>
		        		<?php endforeach; ?>
		        		</select>
		        		<br>
		        		<input type="submit" name="submit" class="btn btn-lg btn-success" value="FIND">
		        	</form>
		      </div>

		      <?php foreach($catjobs as $catjob) : ?>
		      <div class="row marketing">
		        <div class="col-md-10">
		        	<h4><?php echo $catjob['job_title']; ?></h4>
		          <p><?php echo $catjob['description']; ?></p>

		        </div>
		        <div class="col-md-2">
		        	<a class="btn btn-default" href="#">View</a>
		        </div>
		      </div>
		  <?php endforeach; ?>
     
		<?php include 'inc/footer.php'; ?>
