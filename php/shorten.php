<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $short_url = $_POST["short_url"];
    $long_url = $_POST["long_url"];

    // Validate and sanitize inputs
    $short_url = preg_replace("/[^a-zA-Z0-9]+/", "", $short_url);
    $long_url = filter_var($long_url, FILTER_SANITIZE_URL);

    // Insert the mapping into the database
    $sql = "INSERT INTO url_mapping (short_url, long_url) VALUES ('$short_url', '$long_url')";
    if ($con->query($sql) === TRUE) {
        echo "Short URL created successfully: yourdomain.com/$short_url";
    } else {
        echo "Error creating short URL: " . $con->error;
    }
}

$con->close();
?>