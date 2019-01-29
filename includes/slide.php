<div class = "row">
        <div class = "col-md-12">
        <div class="mySlides fade">
            <img id= "slideImg" src="static/images/img1.jpg">
       </div>

       <div class="mySlides fade">
           <img id= "slideImg" src="static/images/img2.jpg">
        </div>

       <div class="mySlides fade">
           <img id= "slideImg" src="static/images/img3.jpg">
       </div>
    </div>
    </div>
       <div style="text-align:center">
           <span class="dot"></span>
           <span class="dot"></span>
           <span class="dot"></span>
       </div>
   </div>
   <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
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