<?php 
require("C:/xampp/htdocs/YAZWarehouse/dataBase/db.php");

if (isset($_GET['id'])) {
    // Delete record
    try {
        // SQL Statement
        $sql = 'DELETE FROM products WHERE id = :id LIMIT 1';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: http://localhost/YAZWarehouse/view/HOMEPAGE.php?status=deleted");
            exit();
        }
        header("Location: HOMEPAGE.php?status=fail_delete");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    // Redirect to index.php
    header("Location: http://localhost/YAZWarehouse/view/HOMEPAGE.php?status=fail_delete");
    exit();
}