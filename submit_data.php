

<?php
if (empty($_POST['email']) || empty($_POST['fullname']) || empty($_POST['password']) || empty($_POST['descrip'])) {
    echo "Please fill out all the form fields.";
    exit;
  }
$email = $_POST['email'];
$name = $_POST['fullname'];
$pass = $_POST['password'];
$des = $_POST['descrip'];

$dbname = "login_credentials";
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO login_info(Email, Full_Name, Password, Description) VALUES ('$email', '$name', '$pass', '$des')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
