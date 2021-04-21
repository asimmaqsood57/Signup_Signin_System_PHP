<?php


$showAlert = false;
$invalidCre = false;
$exist = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'connect_to_database.php';
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  $sqlex = "SELECT * FROM `users` WHERE `username`='$username'";


  $res = mysqli_query($con, $sqlex);

  $numExistRows = mysqli_num_rows($res);

  if ($numExistRows > 0) {
    $exist = true;

  }else {
     
    
      
  if ($password == $cpassword ) {


    $hash =  password_hash($password, PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO `users` ( `username`, `password`) VALUES ( '$username', '$hash');";
  

    $result = mysqli_query($con, $sql);

    if ($result) {
      $showAlert = true;
    }
  
  }else {
    
        $invalidCre = true;

  }


     
  }





}









?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Sign up </title>
  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Sign in</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>


<?php

if ($showAlert) {
   
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> You have successfully registered in our Database.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';


}
if ($invalidCre) {
   
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong> You have written invalid information.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';


}
if ($exist) {
   
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong> This username already exist.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';


}



?>


      <div class="container">

<h1 class="text-center mt-4"> Sign up in our PHP Website</h1>

        <form action="signup.php" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" maxlength = "11" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
          </form>

      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
