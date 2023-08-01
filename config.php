<?php
//connect to db
$servername = "sql304.infinityfree.com";
$username = "if0_34728959";
$password = "GH9890XYNxs2q";
$dbname = "if0_34728959_restos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//insertion
if (isset($_POST['type']) && isset($_POST['resto'])) {
    $type = $_POST['type'];
    $resto = $_POST['resto'];

    $sql = "INSERT INTO restos (type, resto) VALUES ('$type', '$resto')";

    if ($conn->query($sql) === TRUE) {
      header("Location: restos.php");
      exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>