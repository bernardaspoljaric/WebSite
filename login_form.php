<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prijava</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="static/css/registerForm.css" />
    <script src="main.js"></script>
</head>
<body style="background-color:black ">

<div id="id02">
    <div >
    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "empty_fields"){
                echo '<p class = "error">Molimo popunite sva polja.</p>';
            } 
            else if($_GET['error'] == "invalid_email"){
                echo '<p class = "error">Nevažeći email.</p>';
            }
            else if($_GET['error'] == "invalid_name"){
                echo '<p class = "error">Nevažeći korisničko ime.</p>';
            }
            else if($_GET['error'] == "invalid_email_and_name"){
                echo '<p class = "error">Nevažeći email i korisničko ime.</p>';
            }
            else if($_GET['error'] == "password_check"){
                echo '<p class = "error">Pogrešno unesena lozinka</p>';
            }
            else if($_GET['error'] == "user_taken"){
                echo '<p class = "error">Korisničko ime već postoji</p>';
            }

        }

    ?>
    </div>
  <form class="modal-content animate" action="login.php" method="post">
      <div class="container-fluid">
      <h3>Da bi ste komentirali post morate prvo biti prijavljeni.</h3>
      <hr>
      <h1>Prijava</h1>
      <label for="username"><b>Korisničko ime</b></label>
      <input type="text" name="username" placeholder="Korisničko ime"> 
      <label for="password"><b>Lozinka</b></label>
      <input type="password" name="password" placeholder="Lozinka">
      <p style="font-weight: 700">Još niste <a href="register.php">registrirani</a>?</p>
    </div>

    <div class="clearfix container-fluid">
      <button type="submit" name="login-submit">Prijavi se</button>
      <button type="button" onclick="btnClick('index.php')" class="cancelbtn">Odustani</button>
  </div>
  </form>
  
<!------------------------- Scripte ------------------------------>
<script>
        function btnClick(url) {
            window.location = url;
            }
    </script>
</body>
</html>
