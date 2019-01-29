<?php  include 'config.php'; ?>
<?php  include('includes/functions.php'); ?>
<?php include('includes/head.php'); ?>
<?php require ('login.php'); ?>
<?php $posts = getPublishedPosts();	?>
<title> Forum | DyiwfSimple</title>
<link rel="stylesheet" type="text/css" media="screen" href="static/css/registerForm.css" />
</head>
<body style="background-color:black ">
  <form class="modal-content animate" method="post">
      <div class="container-fluid">
      <h3>Napiši komentar</h3>
      <hr>
      <p class="choose">Odaberite koji post želite komentirati!</p>
      <select name='post_title'>
                <option value='' selected disabled>Odabir</option>
                <?php foreach ($posts as $post): ?>
                    <option value='<?php echo $post['title']; ?>'>
                        <?php echo $post['title']; ?>
                    </option>
                <?php endforeach ?>
            </select>
      <?php           
      echo "<form method='POST' action='".setComments($conn)."'>
                    <input type='hidden' name='username' value= '".$_SESSION['user']['username']."'>
                    <input type='hidden' name='date' value='".date('d/m/Y H:i:s')."'>
                    <textarea name='comment_text' class='comment-area' rows='5' placeholder='Napiši komentar...'></textarea><br>
                    <button class ='comment_btn'type='submit' name='comment-submit'>Komentiraj</button>
                    <a href='index.php'>
                    <button class ='back_btn' type='button'>Vrati se na stranicu</button>
                    </a>
                    </form>";
        ?>

    </form>       
    		
  </div>
  </form>
  
</body>
</html>
