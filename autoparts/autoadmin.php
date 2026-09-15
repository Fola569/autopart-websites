<?php
// Include database $con1ection
include 'con1.php';


// Check if form is submitted for PartsVehicle, Sales, Suppliers, or Inventory
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_parts_vehicle'])) {
        $Vehincleid = $_POST['Vehincleid'];
        $partsid = $_POST['partsid'];
        $make = $_POST['make'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $img = $_POST['img'];
        $descr = $_POST['descr'];
        $unitprice = $_POST['unitprice'];

        $sql = "INSERT INTO PartsVehicle (Vehincleid, partsid, make, model, year, img, descr, unitprice) VALUES ('$Vehincleid', '$partsid', '$make', '$model', '$year', '$img', '$descr', '$unitprice')";
        mysqli_query($con1, $sql);
    }

    if (isset($_POST['submit_sales'])) {
        $userid = $_POST['userid'];
        $partsid = $_POST['partsid'];
        $dts = $_POST['dts'];
        $qty = $_POST['qty'];
        $units = $_POST['units'];
        $img = $_POST['img'];

        $sql = "INSERT INTO Sales (userid, partsid, dts, qty, units, img) VALUES ('$userid', '$partsid', '$dts', '$qty', '$units', '$img')";
        mysqli_query($con1, $sql);
    }

    if (isset($_POST['submit_suppliers'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $addr = $_POST['addr'];
        $suplrid = $_POST['suplrid'];

        $sql = "INSERT INTO Suppliers (name, phone, email, addr, suplrid) VALUES ('$name', '$phone', '$email', '$addr', '$suplrid')";
        mysqli_query($con1, $sql);
    }

    if (isset($_POST['submit_inventory'])) {
        $partid = $_POST['partid'];
        $qty = $_POST['qty'];
        $reorder = $_POST['reorder'];
        $img = $_POST['img'];

        $sql = "INSERT INTO Inventory (partid, qty, reorder, img) VALUES ('$partid', '$qty', '$reorder', '$img')";
        mysqli_query($con1, $sql);
    }
}

// Fetch data from all tables
$partsVehicleResult = mysqli_query($con1, "SELECT * FROM PartsVehicle");
$salesResult = mysqli_query($con1, "SELECT * FROM Sales");
$suppliersResult = mysqli_query($con1, "SELECT * FROM Suppliers");
$inventoryResult = mysqli_query($con1, "SELECT * FROM Inventory");
$partsusers = mysqli_query($con1, "SELECT * FROM partsusers");
?>

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vehicle Parts and Sales</title>


<style>
/* Set the background image for the page */
body {
    background: url('bluryx.jpg') no-repeat center center fixed;
    background-size: cover;
    font-family: Arial, sans-serif;
    margin: 50px;
    padding: 0;
    color: black;
}

/* Ensure proper viewport for responsiveness */
meta[name="viewport"] {
    content: 'width=device-width, initial-scale=1.0';
}

/* Style for tables */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: rgba(255, 255, 255, 0.8); /* Slight transparency */
    color: black;
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

/* Alternate table row colors */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:nth-child(odd) {
    background-color: #ffffff;
}

th {
    background-color: #4CAF50;
    color: black;
}

/* Form styling */
form {
    background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
    padding: 10px;
    margin: 20px 0;
    border-radius: 10px;
}

input[type="text"], input[type="email"], textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Image styling */
img {
    max-width: 100px;
    height: auto;
    border-radius: 10px; /* Rounded corners for images */
    border: 1px solid #ddd;
}

/* Styling for action buttons (links) */
a {
    display: inline-block;
    padding: 10px 20px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
}

a:hover {
    background-color: #45a049;
}

/* Responsive table layout */
@media screen and (max-width: 600px) {
    table, th, td {
        display: block;
        width: 100%;
    }

    th {
        display: none;
    }

    td {
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #ddd;
        padding-left: 50%;
        position: relative;
    }

    td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        font-weight: bold;
        text-transform: capitalize;
    }
}


</style>
</head>
<body>

<h2>Welcome Admin,<br>Insert Data</h2>
<h2>Data from Tables</h2>

<!-- Display PartsVehicle Data -->
<h3>Vehicle Parts</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Vehincleid</th>
        <th>Partsid</th>
        <th>Make</th>
        <th>Model</th>
        <th>Year</th>
        <th>Image</th>
        <th>Description</th>
        <th>Unit Price</th>
        <th>Action 1</th>
        <th>Action 2</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($partsVehicleResult)) { ?>
        <tr>
          



         <td><?php echo  $row['id'] ?></td>
            <td><?php echo  $row['vehincleid'] ?></td>
            <td><?php echo  $row['partsid'] ?></td>
            <td><?php echo  $row['make'] ?></td>
            <td><?php echo  $row['model'] ?></td>
            <td><?php echo  $row['year'] ?></td>
            <td><img src="<?php echo  $row['img'] ?>" width="100" height="100"></td>
            <td><?php echo  $row['descr'] ?></td>
            <td><?php echo  $row['unitprice'] ?></td>
            <td><a href="action1.php">Action 1</a></td>
            <td><a href="action2.php">Action 2</a></td>




            
        </tr>
    <?php } ?>
</table>


<br>

<h3>All Users</h3>
<table border="1">
    <tr>
        <th>Company Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>Update</th>
        <th>Update</th>
       
        
    </tr>
    <?php while ($row = mysqli_fetch_assoc($partsusers)) { ?>
        <tr>
            
            <td><?php echo  $row['bizname'] ?></td>
<td><?php echo  $row['email'] ?></td>
            <td><?php echo  $row['password'] ?></td>
        
            <td><img src="<?php echo  $row['img'] ?>" width="100" height="100"></td>
            
            <td><a href="action1.php">Action 1</a></td>
            <td><a href="action2.php">Action 2</a></td>
        </tr>
    <?php } ?>
</table>



<!-- Repeat similar tables for Sales, Suppliers, and Inventory -->

<!-- Display Sales Data -->
<h3>Sales Table</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Partsid</th>
        <th>Date/Time</th>
        <th>Quantity</th>
        <th>Units</th>
        <th>Image</th>
        <th>Action 1</th>
        <th>Action 2</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($salesResult)) { ?>
        <tr>
            <td><?php echo  $row['id'] ?></td>
            <td><?php echo  $row['userid'] ?></td>
            <td><?php echo  $row['partsid'] ?></td>
            <td><?php echo  $row['dts'] ?></td>
            <td><?php echo  $row['qty'] ?></td>
            <td><?php echo  $row['units'] ?></td>
            <td><img src="<?php echo  $row['img'] ?>" width="100" height="100"></td>
            <td><a href="action1.php">Action 1</a></td>
            <td><a href="action2.php">Action 2</a></td>
        </tr>
    <?php } ?>
</table>

<!-- Display Suppliers Data -->
<h3>Suppliers Table</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Supplier ID</th>
        <th>Action 1</th>
        <th>Action 2</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($suppliersResult)) { ?>
        <tr>
            <td><?php echo  $row['id'] ?></td>
            <td><?php echo  $row['name'] ?></td>
            <td><?php echo  $row['phone'] ?></td>
            <td><?php echo  $row['email'] ?></td>
            <td><?php echo  $row['addr'] ?></td>
            <td><?php echo  $row['suplrid'] ?></td>
            <td><a href="action1.php">Action 1</a></td>
            <td><a href="action2.php">Action 2</a></td>
        </tr>
    <?php } ?>
</table>

<!-- Display Inventory Data -->
<h3>Inventory Table</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Part ID</th>
        <th>Quantity</th>
        <th>Reorder Level</th>
        <th>Image</th>
        <th>Action 1</th>
        <th>Action 2</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($inventoryResult)) { ?>
        <tr>
            <td><?php echo  $row['id'] ?></td>
            <td><?php echo  $row['partid'] ?></td>
            <td><?php echo  $row['qty'] ?></td>
            <td><?php echo  $row['reorder'] ?></td>
            <td><img src="<?php echo  $row['img'] ?>" width="100" height="100"></td>
            <td><a href="action1.php">Action 1</a></td>
            <td><a href="action2.php">Action 2</a></td>
        </tr>
    <?php } ?>
</table>

<!-- PartsVehicle Form -->
<form method="post">
    <h3>Insert into PartsVehicle</h3>
    <label>Vehincleid: <input type="text" name="Vehincleid"></label><br>
    <label>Partsid: <input type="text" name="partsid"></label><br>
    <label>Make: <input type="text" name="make"></label><br>
    <label>Model: <input type="text" name="model"></label><br>
    <label>Year: <input type="text" name="year"></label><br>
    <label>Image URL: <input type="text" name="img"></label><br>
    <label>Description: <textarea name="descr"></textarea></label><br>
    <label>Unit Price: <input type="text" name="unitprice"></label><br>
    <input type="submit" name="submit_parts_vehicle" value="Insert">
</form>



<!-- Sales Form -->
<form method="post">
    <h3>Insert into Sales</h3>
    <label>User ID: <input type="text" name="userid"></label><br>
    <label>Part ID: <input type="text" name="partsid"></label><br>
    <label>DateTime (YYYY-MM-DD HH:MM:SS): <input type="text" name="dts"></label><br>
    <label>Quantity: <input type="text" name="qty"></label><br>
    <label>Units: <input type="text" name="units"></label><br>
    <label>Image URL: <input type="text" name="img"></label><br>
    <input type="submit" name="submit_sales" value="Insert">
</form>
<!-- Sales Form -->
<form method="post">
    <h3>Insert into Sales</h3>
    <label>User ID: <input type="text" name="userid"></label><br>
    <label>Part ID: <input type="text" name="partsid"></label><br>
    <label>DateTime (YYYY-MM-DD HH:MM:SS): <input type="text" name="dts"></label><br>
    <label>Quantity: <input type="text" name="qty"></label><br>
    <label>Units: <input type="text" name="units"></label><br>
    <label>Image URL: <input type="text" name="img"></label><br>
    <input type="submit" name="submit_sales" value="Insert">
</form>

<!-- Suppliers Form -->
<form method="post">
    <h3>Insert into Suppliers</h3>
    <label>Name: <input type="text" name="name"></label><br>
    <label>Phone: <input type="text" name="phone"></label><br>
    <label>Email: <input type="email" name="email"></label><br>
    <label>Address: <textarea name="addr"></textarea></label><br>
    <label>Supplier ID: <input type="text" name="suplrid"></label><br>
    <input type="submit" name="submit_suppliers" value="Insert">
</form>

<!-- Inventory Form -->
<form method="post">
    <h3>Insert into Inventory</h3>
    <label>Part ID: <input type="text" name="partid"></label><br>
    <label>Quantity: <input type="text" name="qty"></label><br>
    <label>Reorder Level: <input type="text" name="reorder"></label><br>
    <label>Image URL: <input type="text" name="img"></label><br>
    <input type="submit" name="submit_inventory" value="Insert">
</form>

<hr>


</body>
</html>
