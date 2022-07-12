<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  include "Navbar.php";
  ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <h3>Masuk Sebagai Operator</h3>
      </div>
      <div class="col-sm-4"></div>
    </div>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <hr>
      </div>
      <div class="col-sm-2"></div>
    </div>
    <form class="form-horizontal">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <label class="control-label col-sm-3" for="email">Email</label>
        <div class="col-sm-4">
          <input type="text" name="email" class="form-control" id="pwd" placeholder="Enter email">
        </div>
        <div class="col-sm-4"></div>
      </div>
      <div class="form-group">
        <div class="col-sm-1"></div>
        <label class="control-label col-sm-3" for="pwd">Password</label>
        <div class="col-sm-4">
          <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
        </div>
        <div class="col-sm-4"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Masuk</button>
        </div>
      </div>
    </form>
  </div>
</body>

</html>