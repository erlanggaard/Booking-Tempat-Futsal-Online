<!DOCTYPE html>
<html lang="en">
<head>
  <title>GO Futsal || Maintenance</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../assets/css/w3.css">
    <link rel="stylesheet" href="../assets/css/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <style>
    body {
		background-color:#CCC;
		}
    </style>
</head>
<body>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Nama Admin</h4>
         <p class="w3-center"><img src="../assets/images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Go Futsal Admin</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Username</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
        </div>
      </div>
      <br>

      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
          <button onclick="myFunction('Demo1')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Data </button>
          <div id="Demo1" class="w3-accordion-content w3-container">
            <a href="#">Lapangan</a>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Pemesanan</button>
          <div id="Demo2" class="w3-accordion-content w3-container">
			<a href="#">Booking Offline</a>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Foto</button>
          <div id="Demo3" class="w3-accordion-content w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="../assets/images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../assets/images/nature.jpg" style="width:100%" class="w3-margin-bottom">

           </div>
           <div class="w3-half">
             <img src="../assets/images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../assets/images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../assets/images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="../assets/images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>
      </div>
    <!-- End Left Column -->
    </div>

    <!-- Middle Column -->
    <div class="w3-col m9">
      <div class="w3-container w3-card-2 w3-white w3-round" style="margin-left: 10px"><br>
        <img src="../assets/images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">1 min</span>
        <h4>John Doe</h4><br>
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="../assets/images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
              <img src="../assets/images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
          </div>
        </div>
        <button type="button" class="w3-btn w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
      </div>

    <!-- End Middle Column -->
    </div>

  <!-- End Grid -->
  </div>

<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>
   