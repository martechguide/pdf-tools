<!DOCTYPE html>
<html lang="en"> 
<?php include('admin/head.php'); ?> 
<?php include('admin/header.php'); ?> 
<?php include('admin/user.php'); ?> 
<div id="post-header" class="post-header">
  <div class="color-stripe row w-100 no-margin">
    <div class="bg-main-1"></div>
    <div class="bg-main-2"></div>
    <div class="bg-main-3"></div>
    <div class="bg-main-4"></div>
    <div class="bg-main-5"></div>
    <div class="bg-main-6"></div>
    <div class="bg-main-7"></div>
    <div class="bg-main-8"></div>
  </div>
</div>
<div class="bg-tool">
        <h1>Extract Website Images Online</h1>
        <strong>Easily convert, resize, compress, edit, upscale and remove background for your images online.</strong>
      </div>
<div class="color-stripe row w-100 no-margin">
  <div class="bg-main-1"></div>
  <div class="bg-main-2"></div>
  <div class="bg-main-3"></div>
  <div class="bg-main-4"></div>
  <div class="bg-main-5"></div>
  <div class="bg-main-6"></div>
  <div class="bg-main-7"></div>
  <div class="bg-main-8"></div>
</div>
<div id="ads"> <?php include('admin/ad1.php'); ?> </div>
<div class="container-toolarea">
    <div class="text-center container pt-3">
      <svg width="64px" height="64px" viewBox="0 0 64 64" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:#0074ff;}</style></defs><title></title><path class="cls-1" d="M32,41.5a6,6,0,0,1-1.78-.27l-22.5-7a6,6,0,1,1,3.56-11.46L32,29.22l7.52-2.34A2,2,0,1,1,40.7,30.7l-8.11,2.52a2,2,0,0,1-1.18,0L10.09,26.59a2,2,0,0,0-1.52.14,2,2,0,0,0-1,1.18,2,2,0,0,0,1.32,2.5l22.5,7a2,2,0,0,0,1.18,0l22.5-7a2,2,0,0,0-1.18-3.82L49.44,28a2,2,0,1,1-1.19-3.82l4.47-1.39a6,6,0,1,1,3.56,11.46l-22.5,7A6,6,0,0,1,32,41.5Z"></path></g></svg>
  </div>
</div>
<div class="toolarea">
<?php

?>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form id="form-extractor" class="form-horizontal form-main" method="GET">
                    <input type="text" class="form-control" name="url" placeholder="Enter the URL from where images are to be extracted" required>
                    <br>
                    <button type="submit" class="btn btn-lg btn-success">Extract</button>
                </form>
            </div>
        </div>
    </div>
<?php
function isValidURL($url){
    return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}

if(isset($_GET['url'])){
    $url = $_GET['url'];

    $parts = explode('/', $url);

    $flag = ($parts[0] == 'http:' || $parts[0] == 'https:') ? true : false;

    if($flag == false)
        $url = 'http://'.$url;

    if(!isValidURL($url)){
        echo '<div class="other-text">Invalid URL!</div>';
		die;
	}

    if(substr($url, strlen($url)-1) == '/')
        $url = rtrim($url, "/");

    $parts = explode('/', $url);
    $Root = $parts[0].'//'.$parts[2];
    $html = @file_get_contents($url);

    if(preg_match_all('/<img[^>]+>/i',$html, $result)){
        echo '<div class="container"><div class="row">';
        echo '<div class="col-xs-12 other-text text-center"><strong>URL Searched</strong> : <a href="'.$url.'" target="_blank">'.$url.'</a><br><strong>Parent Domain</strong> : <a href="'.$Root.'" target="_blank">'.$Root.'</a><br></div>';
        echo '';
        echo '</div></div>';
        foreach ($result[0] as $key) {
            preg_match('/src="([^"]+)/i',$key, $src_key);
            for($i=0;$i<count($src_key);$i+=2){
                $src = $src_key[1];
                if(!preg_match("/http:/", $src) && !preg_match("/https:/", $src)){
                    if($src[0]=='/' && $src[1]=='/')
                        $src = 'http:'.$src;
                    elseif($src[0]=='/')
                        $src = $Root.$src;
                    else
                        $src = $Root.'/'.$src;
                }
                echo '<a href="'.$src.'"><img src="'.$src.'" width="250" style="margin:20px"></a>'."\n";
            }
        }
    } else {
		echo '<div class="other-text"><b>No Image Found at your Given Location</b></div>';
    }
} else {
    echo '<div class="other-text"></div>';
}
?>


    
<script src="assets/js/jquery-2.2.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>




</div>
<?php include('admin/ad2.php'); ?><br>
<!---------------------------------------------------------------->

<!--Content Section-->

<div class="styled-section2">
    
        <h2>AI-Based Online Image Tools</h2>
        <p>
            With the rapid advancements in artificial intelligence, managing and enhancing images has never been easier. AI-based online image tools empower users to perform complex tasks with just a few clicks. Whether you're looking to convert images into various formats, resize them to fit specific dimensions, compress large files for quicker loading times, AI tools have got you covered.
        </p>
        <br>
        <h3>Need a higher resolution?</h3>
        <p>
            AI upscaling can enhance your image's clarity without losing quality. For those working with product photos, portraits, or any visuals requiring a clean background, AI-driven background removal offers precision that was once only achievable through professional software.
        </p>
    </div>




<!---------------------------------------------------------------->

<!--FAQs Section-->

<!---------------------------------------------------------------->

<?php include('admin/social.php'); ?> 
<?php include('admin/calltoaction.php'); ?> 
<?php include('admin/footer.php'); ?> 
<button onclick="scrollToTop()" id="backToTopBtn" title="Go to top">&#8679;</button>
  <script async="" defer="" src=""></script>
  <script src="js/qg-main.ac82f574.js" defer=""></script>
  <script src="js/img/01.js" defer=""></script>
  <script>
    // Get the button
    var backToTopBtn = document.getElementById("backToTopBtn");
    // Show the button when scrolling down 20px from the top
    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backToTopBtn.style.display = "block";
      } else {
        backToTopBtn.style.display = "none";
      }
    }
    // Scroll to the top when the user clicks the button
    function scrollToTop() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    }
  </script>
  <style>
h1{
    color:white;
    font-size:34px;
}
</style>
  </body>
</html>