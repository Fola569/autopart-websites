<?php
// Include database $con1ection
include 'con1.php';


// Check if form is submitted for PartsVehicle, Sales, Suppliers, or Inventory
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['signups'])) {        
$bizname = $_POST['bizname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

$result4 = mysqli_query($con1,"SELECT * FROM Partsusers where bizname='$bizname'");

//$row4 = mysqli_fetch_assoc($result4);
$cntusers=mysqli_num_rows($result4);
if($cntusers<1)
{

        

        $sql = "INSERT INTO Partsusers (id, bizname, email, pass) VALUES ('00', '$bizname', '$email', '$pass')";
        mysqli_query($con1, $sql);
}

else

{
echo "User Already Exist";
exit();

}

    }
}
   
// Fetch data from all tables
$sqll = mysqli_query($con1, "SELECT * FROM Partsusers where bizname='$bizname'");

?>

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vehicle Parts and Sales</title>


<style>
/* Set the background image for the page */
body {
    background: url('blury.jpg') no-repeat center center fixed;
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

<!-- Display Inventory Data -->
<h3> <font color=white>Hi, <?php  echo $bizname; ?>Your Signup is Sucessful!<br><br>Your User Info below</h3>
<table border="1">
    <tr>
       
        <th>Business Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>Action 1</th>
        <th>Action 2</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($sqll)) { ?>
        <tr>
            <td><?php echo $row['bizname'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['pass'] ?></td>
            <td><img src="<?php echo $row['pass'] ?>" width="100" height="100"><Upload a Profile Image</td>
            <td><a href="action1.php">Action 1</a></td>
            <td><a href="action2.php">Action 2</a></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
