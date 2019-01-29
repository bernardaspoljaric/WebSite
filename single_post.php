<?php  include 'config.php'; ?>
<?php  include('includes/functions.php'); ?>
<?php $posts = getPublishedPosts();	?>
<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
?>
<?php include('includes/head.php'); ?>
<title> <?php echo $post['title']?> | DyiwfSimple</title>
</head>
<body>
<div class="container">
		<?php include( ROOT_PATH . '/includes/slide.php'); ?>
		<?php include( ROOT_PATH . '/includes/navbar.php'); ?>

	
	<div class="content" >
		<div class="post-wrapper">
			<div class="full-post-div">
			
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			
			</div>
		</div>
		<h3 class="comm">KOMENTARI</h3>
		
		<?php getComments($conn); ?>
		<a href='login_form.php'>
            <button class="comm_btn" type='button'>Napiši komentar</button>
		
        </a>
	</div>
</div>

<script>
		window.onscroll = function() {myFunction()};

		var navbar = document.getElementById("navbar");
		var sticky = navbar.offsetTop;

		function myFunction() {
		if (window.pageYOffset >= sticky) {
			navbar.classList.add("sticky")
		} else {
			navbar.classList.remove("sticky");
		}
		}
	</script>
<?php include( ROOT_PATH . '/includes/footer.php'); ?>