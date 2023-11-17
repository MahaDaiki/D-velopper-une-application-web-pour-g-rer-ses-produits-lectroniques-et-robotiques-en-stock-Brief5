<?php
session_start();

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','maha123');
define('DB_NAME','electronacer_db');
 
// Use mysqli_connect instead of $dbConnection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("Error: " . mysqli_connect_error());
}

// Check if the connection variable is defined and not null
if ($link) {
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($link, $_POST["username"]); 
        $password = mysqli_real_escape_string($link, $_POST["password"]);

        // Perform the query
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($link, $sql); 

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $row['id'];

            // Redirect to the home page
            header("Location: home.php");
            exit();
        } else {
            echo "Please register";
        }
    }

    mysqli_close($link);
    echo "Database connection not available.";
}
?>
