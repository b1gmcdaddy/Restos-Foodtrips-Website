<?php
$servername = "sql304.infinityfree.com";
$username = "if0_34728959";
$password = "GH9890XYNxs2q";
$dbname = "if0_34728959_restos";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $restoId = $_GET['id'];

    // Prepare and execute the SQL query to delete the restaurant with the given 'id'
    $sql = "DELETE FROM restos WHERE resto_id = $restoId";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the main page after successful deletion
        header("Location: restos.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>