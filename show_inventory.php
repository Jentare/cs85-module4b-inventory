<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    // establish PDO connection
    $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // fetch records from items table
    $stmt = $db->query("SELECT * FROM items");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // render inventory items as htmls
    foreach ($items as $item) {
        echo "<p>{$item['item_name']} ({$item['quantity']} units)</p>";
    }
    // add error handling
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();  
} 
?>