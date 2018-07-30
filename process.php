<?php
		require('config/db.php');
		$query = "SELECT * FROM categories ";

		$getcats = mysqli_query($conn, $query);

		

		
?>