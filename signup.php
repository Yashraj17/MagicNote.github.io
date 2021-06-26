<?php
$server="localhost";
$username="root";
$password="";
$database="loginsystem";

$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
  echo "success";
}
?>
<?php
$showAlert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  $existsql= "SELECT * FROM `users` WHERE username = '$username'";
  $result = mysqli_query($conn,$existsql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows>0){
    $showerror = "Username Already Exists";
  }

  else{
  if(($password == $cpassword)){
    $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES 
    ('$username', '$password', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    if($result){
      $showAlert = true;
    }
  }
  else{
    $showerror = "Password do not match";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>signUp</title>
  </head>
  <body>
  <?php
  require 'partial/nav.php'
  ?>
  <?php
  if($showAlert){
  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account has been created now you can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
  }
  if($showerror){
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '.$showerror.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
  }
?>

  <div class="container px-5">
  <h2 class="text-center mt-4">Signup to our website</h2>

  <form action="/loginsystem/signup.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="emailHelp" class="form-text">Make sure to type the same password. </div>
  </div>
  <button type="submit" class="btn btn-primary">Signup</button>
</form>

  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>

  </body>
</html>