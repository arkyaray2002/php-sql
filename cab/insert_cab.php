<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cab";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cno = $_POST["cno"];
    $model = $_POST["model"];
    $colour = $_POST["colour"];
    $purchase_date = $_POST["purchase_date"];

    // Insert record into the "Cab" table
    $sqlInsertCab = "INSERT INTO Cab (cno, model, colour, purchase_date) VALUES ('$cno', '$model', '$colour', '$purchase_date')";
    
    if ($conn->query($sqlInsertCab) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sqlInsertCab . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
