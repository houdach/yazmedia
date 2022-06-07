<?php 
require("C:/xampp/htdocs/YAZWarehouse/dataBase/db.php");

if ($_POST) {
    $id      = (int)($_POST['id']);
    $Nomdeproduit  = trim($_POST['Nomdeproduit']);
    $Quantitenstock  = (int)($_POST['Quantitenstock']);
    $Prixdevente  = (int)($_POST['sheetId']);
   
    try {
        $sql = 'UPDATE products
         SET Nomdeproduit = :Nomdeproduit, Quantitenstock = :Quantitenstock, sheetId = :sheetId
         WHERE id = :id';


        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":Nomdeproduit", $Nomdeproduit);
        $stmt->bindParam(":Quantitenstock", $Quantitenstock);
        $stmt->bindParam(":sheetId", $sheetId);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: http://localhost/YAZWarehouse/dbInteraction/edit.php?id=".$id."&status=updated");
            exit();
        }
        header("Location: http://localhost/YAZWarehouse/dbInteraction/edit.php?id=".$id."&status=fail_update");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: http://localhost/YAZWarehouse/dbInteraction/edit.php?id=".$id."&status=fail_update");
    exit();
}