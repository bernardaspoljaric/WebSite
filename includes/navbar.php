<div class="navbar" id="navbar_id">

<a class="active" href="index.php">Projekti</a>
<a href="novosti.php">Novosti</a>
<a href="register.php" class="login_register">Registracija</a> 

<a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
</a>
<script>
function myFunction() {
  var x = document.getElementById("navbar_id");
  if (x.className === "navbar") {
    x.className += " responsive";
  } else {
    x.className = "navbar";
  }
}
</script>
</div>