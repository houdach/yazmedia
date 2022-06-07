 
 <?php 
require("C:/xampp/htdocs/YAZWarehouse/dataBase/db.php");

if ($_POST) {
    $respo = trim($_POST['respo']);
    $Nomdeproduit  = trim($_POST['Nomdeproduit']);
    $Quantitenstock  = (int)($_POST['Quantitenstock']);
    $sheetId  = trim($_POST['sheetId']);
    try {
        $sql = 'INSERT INTO products(respo,Nomdeproduit,Quantitenstock,sheetId) 
        VALUES(:respo,:Nomdeproduit,:Quantitenstock, :sheetId)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":respo", $respo);
        $stmt->bindParam(":Nomdeproduit", $Nomdeproduit);
        $stmt->bindParam(":Quantitenstock", $Quantitenstock);
        $stmt->bindParam(":sheetId", $sheetId);
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
