<?php
session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true ){
    header("location: login.php");
    exit;
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

    <title>welcome</title>
  </head>
  <body>

  <?php
  require 'partial/nav.php'
 ?>
 <!-- <?php echo "<h1>hii welcome to our page </h1>" .  $_SESSION['username'] 
 ?> -->

<!-- <div class="container">
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">welcome</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to logout </p>    <a class="btn ntn-sm btn-primary mt-3" href="/loginsystem/logout.php">LogOut</a>
  
</div>
</div> -->

<div class="container px-5">
    <h1>Welcome to Magic Notes</h1>


    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Add a note </h5>
        <textarea class="form-control" id="addtxt" rows="3"></textarea>
        <button class="btn btn-primary my-3" id="addbtn">Add Notes </button>
      </div>
    </div>
    <hr>
    <h2>Your Notes</h2>
    <hr>
<div class="row container-fluid " id="notes">
  </div>  

  <!-- this is the new place here we will paste log out system -->


<nav class="navbar fixed-bottom navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-text">
      Developed By YASH : )(
      </span>
    <a class="btn btn-sm btn-primary " href="/loginsystem/logout.php">LogOut</a>
  </div>
</nav>

<script>
  showNotes();
console.log("this is a javascript project");
let addbtn = document.getElementById('addbtn');
addbtn.addEventListener("click",function(e){
  let addtxt = document.getElementById("addtxt");
  let notes = localStorage.getItem("notes");
  if(notes == null){
    notesObj = [];
  }
  else{
    notesObj = JSON.parse(notes);
  }

  notesObj.push(addtxt.value);
  localStorage.setItem("notes",JSON.stringify(notesObj));
  addtxt.value = "";
  console.log(notesObj);
  showNotes();

})

function showNotes(){

  let notes = localStorage.getItem("notes");
  if(notes == null){
    notesObj = [];
  }
  else{
    notesObj = JSON.parse(notes);
  }
let html = "";
notesObj.forEach(function(element,index){
  
  html += `
  <div class="card my-2 mx-2" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Note ${index + 1}</h5>
        <p class="card-text"> ${element} </p>
        <button id="${index}" onclick = "deleteNotes(this.id)" class="btn btn-primary">Delete Note</button>
      </div>
    </div>
    
  </div>
  `
});
let notesElm = document.getElementById("notes");
if(notesObj.length != 0 ){
  notesElm.innerHTML= html;
}
else{
  notesElm.innerHTML = ` Please enter a note to show `;
}
}

function deleteNotes(index){
console.log("i am deleting", index);

let notes = localStorage.getItem("notes");
  if(notes == null){
    notesObj = [];
  }
  else{
    notesObj = JSON.parse(notes);
  }
   
  notesObj.splice(index,1);
  localStorage.setItem("notes",JSON.stringify(notesObj));
  showNotes();

}

</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>

  </body>
</html>