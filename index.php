<?php include 'config.php';?>
<?php require_once(ROOT_PATH . '/includes/functions.php') ?>
<?php $posts = getPublishedPosts(); ?>
<?php include('includes/head.php') ?>
    <title>Home</title>   
</head>
<body>
	<div class="container-fluid">
<!------------------------ Slide show --------------------------->
        <?php include('includes/slide.php') ?>
        
<!------------------------- Navbar ------------------------------->
        <?php include('includes/navbar.php') ?>
<!------------------------- Content ------------------------------->
	<div class="content">
		<div id="projekti">
		<h2 class="content-title">PROJEKTI</h2>
		<hr>
		<?php foreach ($posts as $post): ?>
		<div class="post" style="margin-left: 2%;">
			<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
			<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
				<div class="post_info">
					<h3><?php echo $post['title'] ?></h3>
					<div class="info">
						<span><?php echo date("d/m/Y", strtotime($post["created_at"])); ?></span>
						<span class="read_more">Više..</span>
					</div>
				</div>
			</a>
		</div>
		<?php endforeach ?>
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
<!------------------------- Footer ------------------------------->
<?php include('includes/footer.php') ?>		