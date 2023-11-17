<?php
function get_items() {
    $servername = "localhost";
    $username = "root";
    $password = "maha123";
    $dbname = "electronacer_db";

  
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    $items = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }

    $conn->close();

    return $items;
}

