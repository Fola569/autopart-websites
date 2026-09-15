<?php
// Include database connection
include 'con1.php';

// Create tables
$createPartsVehicleTable = "
CREATE TABLE IF NOT EXISTS PartsVehicle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Vehincleid INT NOT NULL,
    partsid INT NOT NULL,
    make VARCHAR(255),
    model VARCHAR(255),
    year VARCHAR(4),
    img VARCHAR(255),
    descr TEXT,
    unitprice DECIMAL(10,2)
)";
$createSalesTable = "
CREATE TABLE IF NOT EXISTS Sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userid INT NOT NULL,
    partsid INT NOT NULL,
    dts DATETIME NOT NULL,
    qty INT NOT NULL,
    units VARCHAR(50),
    img VARCHAR(255)
)";
$createSuppliersTable = "
CREATE TABLE IF NOT EXISTS Suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    phone VARCHAR(20),
    email VARCHAR(255),
    addr TEXT,
    suplrid INT
)";
$createInventoryTable = "
CREATE TABLE IF NOT EXISTS Inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    partid INT NOT NULL,
    qty INT NOT NULL,
    reorder INT NOT NULL,
    img VARCHAR(255)
)";

// Execute the queries
mysqli_query($con1, $createPartsVehicleTable);
mysqli_query($con1, $createSalesTable);
mysqli_query($con1, $createSuppliersTable);
mysqli_query($con1, $createInventoryTable);

?>

