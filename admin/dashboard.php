<?php  include('../config.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/functions_admin.php'); ?>
	<?php include(ROOT_PATH . '/admin/includes/head_admin.php'); ?>
	<title>Admin | Dashboard</title>
</head>
<body>
<?php include(ROOT_PATH . '/admin/includes/navbar.php'); ?>
	<div class="container dashboard">
		<div class="stats">
			<a href="users.php" class="first">
				<span class="number"><?php echo getUsersCount($conn); ?></span> <br>
				<span class="box_name">Korisnici</span>
			</a>
			<a href="posts.php">
				<span class="number"><?php echo getProjectsCount($conn); ?></span> <br>
				<span class="box_name">Projekti</span>
			</a>
			<a href="news.php">
				<span class="number"><?php echo getNewsCount($conn); ?></span> <br>
				<span class="box_name">Novosti</span>
			</a>
			<a href="comments.php">
				<span class="number"><?php echo getCommentsCount($conn); ?></span> <br>
				<span class="box_name">Komentari</span>
			</a>
		</div>
</body>
</html>