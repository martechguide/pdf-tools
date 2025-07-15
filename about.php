<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
    <link rel="stylesheet" href="css/toolpage.css">
  <div class="bg-tool">
    <h1>About Us</h1>
  </div>
  <div id="ads"> <?php include('admin/ad1.php'); ?> </div>
  <div class="toolarea-pdf">
  
 
  <!---------------------------------------------------------------->
  <!--Content Section-->
  <div class="text-section">
  <h2 class="section-heading">About Us</h2>
  <h3 class="section-subheading">Why Choose Us</h3>
  <p class="section-description">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet pulvinar libero. Nullam vehicula orci non eros fringilla, sit amet egestas justo interdum. Suspendisse potenti. Integer vulputate massa vel nulla faucibus pretium. Fusce vehicula nisl neque, at lacinia dolor suscipit eget.
  </p>
</div>

  <!----------------------------------------------------------------> 
  </div> <?php include('admin/ad2.php'); ?> <br><br>
 <?php include('admin/calltoaction.php'); ?>
<?php include('admin/abovefooter.php'); ?> 
<?php include('admin/footer.php'); ?> 
<?php include('admin/network.php'); ?>
<button onclick="scrollToTop()" id="backToTopBtn" title="Go to top">&#8679;</button>
  <script async="" defer="" src=""></script>
  <script src="js/qg-main.ac82f574.js" defer=""></script>
  <script>
   // Show the button when the user scrolls down 100px from the top of the document
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    const backToTopBtn = document.getElementById("backToTopBtn");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopBtn.classList.add("show");
    } else {
        backToTopBtn.classList.remove("show");
    }
}

// Scroll to the top of the document when the button is clicked
function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'});
}

  </script>
  <style>
      #backToTopBtn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 99;
    background-color: #E5322D;
    color: red;
    border: 1px solid red;
    border-radius: 0;
    padding: 15px;
    font-size: 24px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s, transform 0.3s;
    opacity: 0;
    visibility: hidden;
}

#backToTopBtn:hover {
    background-color: #0056b3;
    transform: translateY(-3px);
}

#backToTopBtn.show {
    opacity: 1;
    visibility: visible;
    transition: opacity 0.3s;
}

/* Responsive for smaller devices */
@media only screen and (max-width: 600px) {
    #backToTopBtn {
        padding: 10px;
        font-size: 18px;
        bottom: 15px;
        right: 15px;
    }
}

  </style>
  </body>
</html>