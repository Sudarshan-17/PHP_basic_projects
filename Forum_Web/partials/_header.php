<?php

session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/phpt/PHP_Projects/Forum_Web/">iDiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/phpt/PHP_Projects/Forum_Web/">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/phpt/PHP_Projects/Forum_Web/about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Catergories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      $sql = "SELECT * FROM `categories`";
      $result =  mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="/phpt/PHP_Projects/Forum_Web/threadlist.php?catid='. $row['category_id'] .'">'. $row['category_name'] .'</a>';
        
      }
    
    echo  '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/phpt/PHP_Projects/Forum_Web/contact.php" >Contact</a>
    </li>
  </ul>';
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
       echo '<form class="form-inline my-2 my-lg-0"  method="get" action="/phpt/PHP_Projects/Forum_Web/search.php">
       <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
       <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
       <p class="text-light my-0 mx-2">Welcome '.$_SESSION['email'].'<p>
     </form>
    <a href="/phpt/PHP_Projects/Forum_Web/partials/_logout.php" class="btn btn-success">Log Out</a>';
  }else{
    echo '<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <div class="row mx-2">
  <button class="btn btn-outline-success" data-toggle="modal" data-target="#loginModal">Log In</button>
  <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">Sign Up</button></div>'; 

  }


 echo '</div>
        </nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Message : </strong> Successfully Registred.. Now you can Log In
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
}else if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Message : </strong>'. $_GET['error'] . 
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
}
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Message : </strong> Successfully Logged In
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
}else if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Message : </strong>'. $_GET['error'] . 
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
}



?>