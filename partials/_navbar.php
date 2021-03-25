<?php

//isset($_SESSION['login']) || $_SESSION['login']!=true
if(isset($_SESSION['login']) && $_SESSION['login']==true ){
    $x = true;
  }else{
    $x = false;
 }


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">iForum</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/php_login/welcome.php">Welcome</a>
      </li>';
  if(!$x){
    echo'
      <li class="nav-item">
        <a class="nav-link" href="/php_login/login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/php_login/signup.php">SignUp</a>
      </li>
      </ul>';
    }
  if($x){
    echo'
      <li class="nav-item">
        <a class="nav-link" href="/php_login/logout.php">Logout</a>
      </li>
    </ul>';
   }   

    echo'
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>';

?>