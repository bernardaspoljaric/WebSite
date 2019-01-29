<?php include 'config.php';?>
<?php require_once(ROOT_PATH . '/includes/functions.php') ?>
<?php $news = getPublishedNews(); ?>
<?php include('includes/head.php') ?>
    <title>Novosti</title>   
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
		<h2 class="content-title">NOVOSTI</h2>
		<hr>

		<?php foreach ($news as $post): ?>
		<div class="news" style="margin-left: 0px;">
			<div class="news-body-div">
					<h3><?php echo $post['title'] ?></h3>
					<?php echo html_entity_decode($post['body']); ?>
				</div>
				<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="news_image" alt="">
				<div class="news_info">
					<div class="info">
						<span><?php echo date("d/m/Y", strtotime($post["created_at"])); ?></span>
						
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