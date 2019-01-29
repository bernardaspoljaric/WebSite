<?php  include 'config.php'; ?>
<?php  include('includes/functions.php'); ?>
<?php include('includes/head.php'); ?>
<?php require ('login.php'); ?>
<?php $posts = getPublishedPosts();	?>
<title> Forum | DyiwfSimple</title>
</head>
<body>
<div class="container">

		<?php include( ROOT_PATH . '/includes/slide.php'); ?>
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>

        <div class="content">
        <h1>SLOBODNI TJEK MISLI</h1>
        <div class="idea_wrap">
            <p>Ovaj dio stranice osmišljen je za protok ideja bilo mene bilo vas. Kako tko ima ideju ili pak treba nekakvu pomoć slobodno se može izraziti.</p>
        </div>
            <?php 
            getComments($conn);
            error_reporting(E_ALL & ~E_NOTICE);
                if($_GET['success'] == "You_are_now_logged_in"){
                    echo"<h4 class='text-center'>KOMENTIRAJ</h4><br>
                    <a href='index.php' name='logout-submit'>
                    <button type='button'>Odjava</button>
                    </a>";
                    echo "<form method='POST' action='".setComments($conn)."'>
                    <input type='hidden' name='username' value= '".$_SESSION['user']['username']."'>
                    <input type='hidden' name='date' value='".date('d/m/Y H:i:s')."'>
                    <textarea name='comment_text' class='comment-area' rows='5' placeholder='Napiši komentar...'></textarea><br>
                    <button type='submit' name='comment-submit'>Komentiraj</button>
				    </form>";
                }
                else{
                  echo'<h4 class="text-center">Prijavite se kako bi komentirali..</h4><br>
                  <a href="login_form.php">
                  <button type="button">Prijava</button>
                  </a>';
                }
			
			?>
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