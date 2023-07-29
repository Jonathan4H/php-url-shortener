<?php
session_start();

// Check if the user is logged in, otherwise redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

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

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Retrieve the list of shortened URLs for the current user along with visit counts
$sql = "SELECT url_mapping.short_url, url_mapping.long_url, COUNT(url_visits.id) AS visit_count
        FROM url_mapping
        LEFT JOIN url_visits ON url_mapping.id = url_visits.url_id
        WHERE url_mapping.user_id = $user_id
        GROUP BY url_mapping.id";

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Dashboard</h1>
        <p>Hello, <?php echo $_SESSION['username']; ?>! Here is the list of your shortened URLs:</p>
        <table>
            <tr>
                <th>Short URL</th>
                <th>Long URL</th>
                <th>Visit Count</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['short_url']; ?></td>
                    <td><?php echo $row['long_url']; ?></td>
                    <td><?php echo $row['visit_count']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <a href="logout.php">Logout</a>
    </body>
</html>