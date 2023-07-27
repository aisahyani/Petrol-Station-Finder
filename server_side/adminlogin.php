    <?php
include('login_a.php'); // Includes Login Script

if(isset($_SESSION['login_user1'])){
header("location: admin/index.php"); //Redirecting to myproducts Page
}
?>

<!DOCTYPE html>
<html>

  <head>
<style>
	body {
  background-image: url('images/background.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}</style>

    <title> Admin Login </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/adminlogin.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>

    <center><div class="container">
    <br>
    <h1> &ensp; &ensp; &ensp; &ensp; Hi Admin, welcome to <span class="edit"> User Location Map </span></h1></center>
    </div>
<br>

    <center><div class="container" style="margin-top: 1%; margin-bottom: 2%;">
      <div class="col-md-5 col-md-offset-4">
        <label style="margin-left: 5px;color: red;"><span> <?php echo $error;  ?> </span></label>
      <div class="panel panel-primary">
        <div class="panel-heading"> Login </div>
        <div class="panel-body">
          
        <form action="" method="POST">
          
        <div class="row">
          <div class="form-group col-xs-12">
            <label for="username"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
            <div class="input-group">
              <input class="form-control" id="username" type="text" name="username" placeholder="Username" required="" autofocus="">
              </span>
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
            <div class="input-group">
              <input class="form-control" id="password" type="password" name="password" placeholder="Password" required="">
              
            </div>           
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-12">
              <button class="btn btn-primary" name="submit" type="submit" value=" Login ">Login</button>

          </div>

        </div>
      
        </form>

        </div>
        
      </div>
      
    </div>
    </div>
</center>
    </body>
</html>