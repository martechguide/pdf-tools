<!DOCTYPE html>
<html lang="en"> 
<body class="lang-en-US home  ">
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?>
<?php include('admin/hero.php'); ?> 
<?php include('admin/tools.php'); ?> 
<?php include('admin/tools1.php'); ?> 
<?php include('admin/tools2.php'); ?> 
<?php include('admin/features-block.php'); ?>
<?php include('admin/trusted-block.php'); ?> 
<?php include('admin/faq.php'); ?>
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
    color: white;
    border: none;
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