<?php
 
 session_start();
 require("C:/xampp/htdocs/YAZWarehouse/dataBase/db.php");
 require_once 'C:\xampp\htdocs\YAZWarehouse\sheetsIntegration\readSheet.php';
 if ($_SESSION["Role"] == 'Admin'){
  try {

    $sql = "SELECT * FROM products ";
    $result = $conn->query($sql);
    $product = $result->fetch();
  }catch (Exception  $e) {
    echo "Error " . $e->getMessage();
    exit();
  
   }
  
}
 elseif ($_SESSION["Role"] == 'CLIENT'){
  try {

    $userName = $_SESSION["username"];
    
    $sql = "SELECT * FROM products WHERE respo = \"".$userName."\" ";
    $result = $conn->query($sql);
    $product = $result->fetch();
  }catch (Exception  $e) {
    echo "Error " . $e->getMessage();
    exit();
  
   }
  
}
?>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<link rel="stylesheet" href="../public/css/style.css">

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
   
<style>

  body {
  
  font-family: sans-serif;
  background: rgba(17, 152, 230, 0.425);
  background: linear-gradient(90deg, rgb(255, 255, 204) 26%, rgb(255, 255, 204) 54%, rgb(255, 255, 204) 54%);
}

  .bg-primary {

    background-color:#001a4d!important;
    background: rgba(0,0,0,0.7);
    border :4px;
    border-color: #000000;

  }

  :root {

  
    --bs-gray-dark: #3973ac!important;

  }


  .btn-primary.focus, .btn-primary:focus {

    color: #ffffb3;

    background-color: #ffff66;

    border-color: #ffff669c;

    box-shadow: 0 0 0 0.2rem rgb(210 30 43 / 32%);
    border-radius: 10px;

  }

  .btn-primary {

    color: #ffffb3;

    background-color: #ffff66;

    border-color: #ffff66;
    border-radius: 10px;

  }

  .btn-primary:hover {

    color:#ffff66;

    background-color: #264d73;

    border-color: #264d73;
    border-radius: 10px;

  }

  primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {

    color: #ffffb3;

    background-color: #264d73;

    border-color: #264d73;
    border-radius: 10px;

  }

  .card-title {

    margin-bottom: .75rem;

    color:#ffff00;
    font-size: 10pt
  


}
.card {
  width: 80%;
  height: 90%;
  max-height: 300px;
  padding: auto;
  text-align: center;
  background:rgb(0, 26, 77);
  border-radius: 10px;
  color:#66a3ff;
  box-shadow: 0 15px 25px rgba(0,0,0,0.5);
  border-radius: 10px;
  outline: #ffff00;
  border-left: 6px solid;
  border-right: 4px;
  border-color : #ffff00;
 
}  
.card::before {
  content:'';
  position: absolute;
  top: 0;
  left: 0;
  width: 50%;
  height: 100%;
  background: rgba(255,255,255, 0.08);
  transform: skewX(-26deg);
  transform-origin: bottom left;
  border-radius: 10px;
  pointer-events: none;
  
}
.btn {
  border-radius: 10px;
  width: 100%
}

.DIRECTION {
    font-weight: bold;
    color: #ffff00;
    border-left: 5px solid;
    padding-left: 10px;
    font-size: 15pt

}
.text-center {
  font-weight: bold;

}
.text-align {
  text-align: left;
}
.h1 {
  color: #ffff00;
}
::-webkit-input-placeholder {
  color: #8cb3d9;
  opacity: 1;
}

:-moz-placeholder { /* Firefox 18- */
  color: #8cb3d9;
  opacity: 1;
}

::-moz-placeholder {  /* Firefox 19+ */
  color: #8cb3d9;
  opacity: 1;
}

:-ms-input-placeholder {  
  color: #8cb3d9;
  opacity: 1;
}
input{
  padding:0;
  border-radius: 0;
  border: none;
  font-size: 20px;
  color: #8cb3d9;
  background:none;
  letter-spacing: 1px;
  word-spacing: 10px;
  font-family: 'Arvo', sans-serif;
  padding: 0;
  line-height: 25px;
}
#searchBox{
  padding-top: 2vh;
  padding-left: 2vh;
  padding-bottom: 2vh;
  outline: 4px;
}
.form{
  padding: 10px 0;
  padding-right: 15px;
  border: 3px solid #99ff99;
  
}

.form.col-xs-12{
  padding-left: 2;
  color: #8cb3d9;
}
button{
  background: none;
  border: none;
  padding-left: 0vh;

}
</style>
	
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">YAZ Media warehouse</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/YAZWarehouse/view/HOMEPAGE.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/YAZWarehouse/dbInteraction/create.php">Nouveau produit</a>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <a class="nav-link" href="http://localhost/YAZWarehouse/dataBase/logout.php"><i class="gLyficon gLyficon-log-out"></i>  Déconnexion</a>
    </ul>
</div>
</nav>
<div class=" text-center container" id="searchBox">
  <form action="http://localhost/YAZWarehouse/dbInteraction/search.php" method="POST">
    <input  class="form col-xs-12 " type="text" name="search" placeholder="search" >
    <button type="submit" name="submit-search"><img src="https://img.icons8.com/fluency/48/undefined/search.png"/></button>
  </form>
</div>

<div class="col-lg-15">
    <div class="container">
        <div class="text-center" >
            <?php
            if (isset($_SESSION["username"])) {
                echo "<h1 class='text-center'> Bonjour ". $_SESSION["username"] ." </h1>";
    }
    ?>
</div>
 <hr/>
 <h5 class="text-center"> Tous les produits</h5>
 <hr>
 <div class="text-center">
     <img src="Fountain.gif" id="loader" style="display:none;">
</div>



<style>
.col-sm-3{
  margin-bottom: 30px;
}
</style>

<div class="row row-cols-1 row-cols-md-3 g-4" id="result">

    <?php if ($result->rowCount() > 0) : ?>
     <?php foreach ($result as $product) :
     $sheetId = $product["sheetId"];
     read_sheet($sheetId);
     $product['Quantitenstock']=$product['Quantitenstock']-read_sheet($sheetId);
      ?>
      
  
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class='card-text DIRECTION'> <?= $product['Nomdeproduit'] ?>  </p>
                    <h5 class='card-title'><?=$product['respo'] ; ?></h5>
                    <h6 class='text-align '>Quantité en stock	 : <b><?= $product['Quantitenstock'];?></b> unité</h6>
                    
                      <a href="http://localhost/YAZWarehouse/dbInteraction/edit.php?id=<?=$product['id']?>"style="width:100%;" class="btn btn-sm btn-dark"><i class="fa fa-edit"></i> Modifier</a>
                      <a href="#" style='width:100%;' class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-delete-<?= $product['id'] ?>"><i class="fa fa-trash"></i>Supprimer</a>
          

                </div>
            </div> 
        </div>
      <?php include("C:/xampp/htdocs/YAZWarehouse/dbInteraction/modal.php") ?>
    <?php endforeach ?>
  <?php endif ?>
       
</div>
</div>
</div>
</div>