<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Menu</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Category</a>
  <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button">Restaurants</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Contact Us</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16"> <a href="#"> Profile </a></div>
    <div class="w3-center w3-padding-16">Rate 'em</div>
  </div>
</div>
  
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
    
    <input type="text" placeholder="Search...">
    <?php session_start(); print_r($_SESSION); ?>
  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <div class="w3-quarter">
      <img src="images/subway.jpg" alt="Sandwich" style="width:100%">
      <h3>Subway</h3>
      <p>American fast food restaurant franchise that primarily purveys submarine sandwiches and salads.</p>
    </div>
    <div class="w3-quarter">
      <img src="images/greek.jpg" alt="Sovlaki" style="width:100%">
      <h3>Jimmy the Greek</h3>
      <p>A quick service restaurant franchise serving Greek and Mediterranean cuisine.</p>
    </div>
    <div class="w3-quarter">
      <img src="images/shawarma2.jpg" alt="Shawarma" style="width:100%">
      <h3>Shawarma Palace</h3>
      <p>Lebanese Eatery has been serving up its popular delicacies for well over a decade. </p>
    </div>
    <div class="w3-quarter">
      <img src="images/meshawi.jpg" alt="Turkish" style="width:100%">
      <h3>Topkapi</h3>
      <p>Long-running eatery specializing in beef and lamb doner kebab along with other Turkish dishes.</p>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <img src="images/bbq.jpg" alt="Meditteranean" style="width:100%">
      <h3>Matar Kebab</h3>
      <p>A local family owned business that makes BBQ'ed meat Middle Eastern style.</p>
    </div>
    <div class="w3-quarter">
      <img src="images/padthai.jpg" alt="Thai" style="width:100%">
      <h3>Thai Express</h3>
      <p>a franchise chain of quick service restaurants serving Thai cuisine across Canada.</p>
    </div>
    <div class="w3-quarter">
      <img src="images/taco.jpg" alt="Mexican" style="width:100%">
      <h3>Mucho Burrito</h3>
      <p>Described as ‘Mucho food with Mucho quality’, Mucho Burrito provides guests with an unmatched flavour experience, offering fresh and authentic Mexican food. </p>
    </div>
    <div class="w3-quarter">
      <img src="images/sushi.jpg" alt="Japanese" style="width:100%">
      <h3>Ten Sushi</h3>
      <p>All-you-can-eat restaurant serving Japanese dishes and a variety of sushi in modern, minimalist digs.</p>
    </div>
  </div>
    
    <!-- Third Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center">
    <div class="w3-quarter">
      <img src="images/manaqeesh.jpg" alt="Middle Eastern" style="width:100%">
      <h3>Tche Tche</h3>
      <p>Serving our customers a variety of food from Manaqeesh to American cuisine and Shisha.</p>
    </div>
    <div class="w3-quarter">
      <img src="images/salmon.jpg" alt="French" style="width:100%">
      <h3>La Mer</h3>
      <p>Serving you french cuisine with a twist.</p>
    </div>
    <div class="w3-quarter">
      <img src="images/omellette.jpg" alt="American" style="width:100%">
      <h3>Cora</h3>
      <p>A Canadian chain of casual restaurants serving breakfast and lunch.</p>
    </div>
    <div class="w3-quarter">
      <img src="images/butterchicken.jpg" alt="Indian" style="width:100%">
      <h3>TAJ Indian Cuisine</h3>
      <p>Casual establishment with a classic Indian menu of curries and tandoori, with a weekday lunch buffet.</p>
    </div>
  </div>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>
  
  <hr id="about">

  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <h3>About us, the Website developers</h3><br>
    <img src="/w3images/chef.jpg" alt="Me" class="w3-image" style="display:block;margin:auto" width="800" height="533">
    <div class="w3-padding-32">
      <h4><b>Who are we?!</b></h4>
      <h6><i>With Passion For Real, Good Food we thought of bringing you this website to help you make educated decisions when it comes to eating out.</i></h6>
      <p>We are a student run website at the university of Ottawa, bringing you this food rating system to help mainstream your </p>
    </div>
  </div>
  <hr>
  
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
    <div class="w3-third">
      <h3>Contact us</h3>
        <p> csi2132_2018winter@uottawa.ca </p>
      <p>Template taken from <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>
  


    <div class="w3-third w3-serif">
      <h3>POPULAR TAGS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ottawa</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
      </p>
    </div>
  </footer>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>
