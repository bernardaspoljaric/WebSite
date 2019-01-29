<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/functions_admin.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/news_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_admin.php'); ?>

<?php $posts = getAllNews(); ?>
	<title>Admin | Objave</title>
</head>
<body>

	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>

	<div class="container content">

		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>


		<div class="table-div"  style="width: 80%;">

			<?php include(ROOT_PATH . '/includes/messages.php') ?>

			<?php if (empty($posts)): ?>
				<h1 style="text-align: center; margin-top: 20px;">U bazi podataka nema novosti</h1>
			<?php else: ?>
				<table class="table">
						<thead>
						<th>N</th>
						<th>Naziv</th>
						<?php if ($_SESSION['user']['role'] == "Admin"): ?>
							<th><small>Objavljeno</small></th>
						<?php endif ?>
						<th><small>Uredi</small></th>
						<th><small>Obriši</small></th>
					</thead>
					<tbody>
					<?php foreach ($posts as $key => $post): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $post['title']; ?></td>
							
							<?php if ($_SESSION['user']['role'] == "Admin" ): ?>
								<td>
								<?php if ($post['published'] == true): ?>
									<a class="fa fa-check btn unpublish"
										href="news.php?unpublish=<?php echo $post['id'] ?>">
									</a>
								<?php else: ?>
									<a class="fa fa-times btn publish"
										href="news.php?publish=<?php echo $post['id'] ?>">
									</a>
								<?php endif ?>
								</td>
							<?php endif ?>

							<td>
								<a class="fa fa-pencil btn edit"
									href="create_news.php?edit-news=<?php echo $post['id'] ?>">
								</a>
							</td>
							<td>
								<a  class="fa fa-trash btn delete" 
									href="create_news.php?delete-news=<?php echo $post['id'] ?>">
								</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div>

	</div>
</body>
</html>