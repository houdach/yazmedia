<?php 
require("C:/xampp/htdocs/YAZWarehouse/dataBase/db.php");
$id = $_GET['id'] ? intval($_GET['id']) : 0;

try {
    $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();    
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

if (!$stmt->rowCount()) {
    header("Location: http://localhost/YAZWarehouse/view/HOMEPAGE.php");
    exit();
}
$product = $stmt->fetch();
?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="../public/css/style.css">
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

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
    color: #fff;
    background-color: #001a4d;
    border-color: #d21e2b9c;
    box-shadow: 0 0 0 0.2rem rgb(210 30 43 / 32%);
}
.btn-primary {
    color: #fff;
    background-color: #001a4d;
    border-color: #001a4d;
}
.btn-primary:hover {
    color: #fff;
    background-color: #9e1b25;
    border-color: #9e1b25;
}
primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #9e1b25;
    border-color: #9e1b25;
}
.card-title {
    margin-bottom: .75rem;
    color: #001a4d;
}

.form-control {
    border-color:#ffff00;
    background: rgb(0, 26, 77);
    border-radius: 10px;
    color: #fff;
}
.text-center{
    border-color:#990000;
    background: rgba(0,0,0,0.7);
    border-radius: 10px;
    color: #fff;
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
</div>
</nav>
<div class="container">
    <?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Modifié</strong>
        </div>
    <?php endif ?>
    <?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Impossible de modifier</strong>
        </div>
    <?php endif ?>
    <!-- Create Form -->
    <form action="http://localhost/YAZWarehouse/dbInteraction/update.php"   method="POST">
        <input type="hidden" name="id"  value= "<?= $product['id']  ?>">
        <div class="form-row">
            <div class="col-6">
                <label for="Nomdeproduit">Nom du produit</label>
                <input type="text" class="form-control" name="Nomdeproduit" id="Nomdeproduit" placeholder="Nomdeproduit" required value= "<?= $product['Nomdeproduit']  ?>">
            </div>
            <div class="col-6">
                <label for="Quantitenstock">Quantité en stock</label>
                <input type="text" class="form-control" name="Quantitenstock" id="Quantitenstock" placeholder="Quantitenstock" required value= "<?= $product['Quantitenstock']  ?>">
            </div>
            <div class="col-6">
                <label for="sheetId ">Id de sheet </label>
                <input type="text" class="form-control" name="sheetId " id="sheetId "placeholder="sheetId" required value= "<?= $product['sheetId']  ?>">
            </div>
        </div>
        <hr/>
        
        <hr/>
        <input type="submit" class="btn btn-primary" value="Enregistrer" name="save">
    </form>
    <!-- End create form -->
    <br>
</div><!-- /.container -->