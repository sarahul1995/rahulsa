<!-- submit_contact.php -->
<?php
// Database connection parameters
$serverName = "DESKTOP-348H65V"; // e.g., localhost
$connectionOptions = array(
    "Database" => "website", // your database name
    "Uid" => "DESKTOP-348H65V\Rahul Das", // your SQL Server username
    "PWD" => "sa" // your SQL Server password
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
    $params = array($name, $email, $message);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo "Thank you for your message!";
    } else {
        echo "Error: " . print_r(sqlsrv_errors(), true);
    }

    // Close the statement and connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>
