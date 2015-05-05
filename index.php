<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog by Josh Polimeno</title>
    <link rel="stylesheet" href="style/bootstrap.min.css">
	<link rel="stylesheet" href="style/bootstrap.css">
</head>
<body>

	<div class="container">
		
		<h1>Blog by Josh Polimeno</h1>
		<ul class="nav nav-pills">
  			<li> <a href="admin/login.php" class="btn btn-primary btn-lg">Blog Administration</a></li>
  			<li> <a href="admin/add-post.php" class="btn btn-primary btn-lg">Add Post</a></li>
  			<li> <a href="admin/add-user.php" class="btn btn-primary btn-lg">Add Users</a></li>
  			<li> <a href="admin/logout.php" class="btn btn-primary btn-lg">Logout</a></li>
		</ul>
		<hr />

		<?php
			try {

				$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
				while($row = $stmt->fetch()){
					
					echo '<div>';
						echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</div>


</body>
</html>