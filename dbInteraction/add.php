 
 <?php 
require("C:/xampp/htdocs/YAZWarehouse/dataBase/db.php");

if ($_POST) {
    $respo = trim($_POST['respo']);
    $Nomdeproduit  = trim($_POST['Nomdeproduit']);
    $Quantitenstock  = (int)($_POST['Quantitenstock']);
    $Prixdevente  = (int)($_POST['Prixdevente']);
    try {
        $sql = 'INSERT INTO products(respo,Nomdeproduit,Quantitenstock,Prixdevente) 
        VALUES(:respo,:Nomdeproduit,:Quantitenstock, :Prixdevente)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":respo", $respo);
        $stmt->bindParam(":Nomdeproduit", $Nomdeproduit);
        $stmt->bindParam(":Quantitenstock", $Quantitenstock);
        $stmt->bindParam(":Prixdevente", $Prixdevente);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: create.php?status=created");
            exit();
        }
        header("Location: create.php?status=fail_create");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: create.php?status=fail_create");
    exit();
}
?>
