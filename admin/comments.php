<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/functions_admin.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/comment_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>
<?php include(ROOT_PATH . '/admin/includes/head_admin.php'); ?>
<?php $posts = getAllPosts(); ?>
<link rel="stylesheet" type="text/css" href="static/css/style.css">
<title>Admin | Komentari</title>
</head>
<body>

	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>

	<div class="container content">

		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>


		<div class="comment_section"  style="width: 50%;">
		<?php include(ROOT_PATH . '/includes/messages.php') ?>
		<?php foreach ($posts as $post): ?>
		<div class='title'>
		<?php $title = $post['title']; ?>
		</div>
		<?php echo $title; ?>
		
            <?php getComments($conn, $title); ?>
        
		<?php endforeach ?>
		</div>
        </div>
</body>
</html>