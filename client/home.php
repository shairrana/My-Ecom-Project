<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container">
    <a class="navbar-brand text-white" href="?home=true">My Store</a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between align-items-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="?home=true">Home</a>
        </li>
        <?php include("./client/selectcategory.php");
        if ($result) {
          foreach ($result as $res) {
            $categoryId = $res['id'];
            $categoryName = $res['categoryName'];
            echo "<li class='nav-item'><a class='nav-link text-white' href='?categoryId=true&&categoryId=$categoryId'>" . ucfirst($categoryName) . "</a></li>";
          }
        } ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="?latestProduct=true">Latest products</a>
        </li>
       <?php if (isset($_SESSION['user']['userName']) && isset($_SESSION['user']['userEmail'])) { ?>
        <li class="nav-item">
          <a class="nav-link text-white" href="?cartNav=true">Cart</a>
        </li>
       <?php }?>
      </ul>
      <form class="d-flex" action="">
        <input class="form-control me-2" name="search" type="search" placeholder="Search">
        <button class="btn btn-outline-primary text-white" type="submit">Search</button>
      </form>
      <div>
        <?php
        if (!isset($_SESSION['user']['userName']) && !isset($_SESSION['user']['userEmail'])) { ?>
          <a class='btn btn-primary mx-2' href='?signUp=true'>Sign Up</a>
          <a class='btn btn-primary' href='?login=true'>Login</a>
        <?php } else { ?>
          <a class='btn btn-primary mx-2' href='?loginOut=true'><i class="fa-solid fa-right-to-bracket"></i> Log Out</a>
        <?php }
        ?>
      </div>
    </div>
  </div>
</nav>
<div class="container my-4">
  <div class="row row-cols-md-3 g-4">
    <?php include("./client/getProductDetails.php");
    if ($result) {
      
      foreach ($result as $res) {
        $pId = $res['productId'];
        $pName = $res['Pname']; 
        $pPrice = $res['Pprice'];   
        $pImage = $res['Pimage'];
        $categoryId = $res['CategoryId']; 
        echo "<div class='col'>
        <div class='card' style='width: 20rem;'>
          <img src='$pImage' class='card-img-top' style='width: 100%; height:20rem;' alt='...'>
          <div class='card-body'>
            <h5 class='card-title'>$pName</h5>
            <p class='card-text'>Rs $pPrice</p>";
  
  if (!isset($_GET['cartNav'])) {
      echo "<a href='?addCart=true&&productId=$pId' class='btn btn-primary'>Add Cart</a>";
  } else {
      echo "<a href='?removeCart=true&&productId=$pId' class='btn btn-primary'>Remove Cart</a>";
  }
  
  echo "   </div>
        </div>
      </div>";
}
    }
  ?>
  
  </div>
</div>