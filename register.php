<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registracija</title>
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
        else if($_GET['success'] == "signup"){
            echo '<p class = "success">Uspješno ste registrirani!</p>';
        }
    ?>
    </div>
  <form class="modal-content animate" action="registration.php" method="post">
      <div class="container-fluid">
      <h1>Registracija</h1>
      
      <label for="username"><b>Korisničko ime</b></label>
      <input type="text" name="username" placeholder="Korisničko ime">
      <label for="email"><b>Email</b></label>
      <input type="text" name="email" placeholder="E-mail">  
      <label for="password1"><b>Lozinka</b></label>
      <input type="password" name="password1" placeholder="Lozinka">
      <label for="password2"><b>Ponovite lozinku</b></label>  
      <input type="password" name="password2" placeholder="Potvrda lozinke">
      
      
    </div>

    <div class="clearfix container-fluid">
      <button type="submit" name="register-submit">Registriraj se</button>
      <button type="button" onclick="btnClick('index.php')" class="cancelbtn">Zatvori</button>
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
