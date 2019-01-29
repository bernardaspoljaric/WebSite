<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/functions_admin.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/news_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_admin.php'); ?>
	<title>Admin | Napiši objavu</title>
</head>
<body>

	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>

	<div class="container content">

		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<div class="action create-post-div">
			<h1 class="page-title">Napiši/uredi objavu</h1>
			<form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/create_news.php'; ?>" >

				<?php if ($isEditingNews === true): ?>
					<input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
				<?php endif ?>

				<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Naziv">
				<label style="float: left; margin: 5px auto 5px;">Slika</label>
				<input type="file" name="featured_image" >
				<textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>
				

				<?php if ($_SESSION['user']['role'] == "Admin"): ?>

					<?php if ($published == true): ?>
						<label for="publish">
							Objavi
							<input type="checkbox" value="1" name="publish" checked="checked">&nbsp;
						</label>
					<?php else: ?>
						<label for="publish">
							Objavi
							<input type="checkbox" value="1" name="publish">&nbsp;
						</label>
					<?php endif ?>
				<?php endif ?>
				
				<?php if ($isEditingNews === true): ?> 
					<button type="submit" class="btn" name="update_news">IZMJENI</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_news">SPREMI</button>
				<?php endif ?>

			</form>
		</div>

	</div>
</body>
</html>

<script>
	CKEDITOR.replace('body');
</script>