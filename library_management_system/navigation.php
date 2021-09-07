
<?php
$result="";

if(isset($_POST['search_button']))
{
  if(empty(verifyInput($_POST['seachTitle']))){

    $result = "is empty";

  }
  else{
    $result = verifyInput($_POST['seachTitle']);
    $_SESSION['search_book'] = $result;
    header("Location:bookseach.php");
  }
  

}

function verifyInput($var)
    {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        
        return $var ;
    }

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Library
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="profil.php">Profil <i class="fa fa-user" aria-hidden="true"></i>
<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list_books.php">Books <i class="fa fa-book" aria-hidden="true"></i> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fines.php">Fines <i class="fas fa-money-check-alt"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out <i class="fas fa-sign-out-alt"></i></a>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0" action="bookseach.php" method="post">
      <input class="form-control mr-sm-2" type="text" name="seachTitle" placeholder="Search by title or author" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="search_button" id="search_button" type="submit">Search</button>
    </form>
  </div>
</nav>
