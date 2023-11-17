<?php
include 'getitems.php'; 
$servername = "localhost";
    $username = "root";
    $password = "maha123";
    $dbname = "electronacer_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch categories from the database
$categoriesResult = $conn->query("SELECT DISTINCT categorie FROM products");

// Fetch products based on the selected category filter
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : null;

if ($categoryFilter) {
    
    $categoryString = "'" . implode("','", $categoryFilter) . "'";

    
    $sql = "SELECT * FROM products WHERE categorie IN ($categoryString)";
    $result = $conn->query($sql);
} else {
    
    $result = $conn->query("SELECT * FROM products");
}
$categoriesResult = $conn->query("SELECT DISTINCT categorie FROM products");


$categoryFilter = isset($_GET['category']) ? $_GET['category'] : null;


$stockFilter = isset($_GET['stock']) && $_GET['stock'] === 'low' ? true : false;

if ($categoryFilter) {
   
    $categoryString = "'" . implode("','", $categoryFilter) . "'";

    $sql = "SELECT * FROM products WHERE categorie IN ($categoryString)";
    
  
    if ($stockFilter) {
        $sql .= " AND quantite_stock <= quantite_min";
    }
    
    $result = $conn->query($sql);
} else {
    
    $result = $conn->query("SELECT * FROM products");

    
    if ($stockFilter) {
        $result = $conn->query("SELECT * FROM products WHERE quantite_stock <= quantite_min");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>items</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style=" background-image:none;
        background-color: #b2bafc">
        <nav class="navbar navbar-expand-sm navbar-dark">
            <div class="container">
               <a href="#" class="navbar-brand">NE</a>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="home.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="items.php" class="nav-link">items</a>
                        </li>
                        <li class="nav-item lo">
                            <a href="index.php" class="nav-link">Login</a>
                        </li>
                    </ul>
            </div>
    </nav>
    <div class="container mt-4">
    <form action="" method="get" class="row mt-4 justify-content-center">
        <?php
        // Display checkboxes for each category
        while ($row = $categoriesResult->fetch_assoc()) {
            $categoryName = $row['categorie'];
            ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="category[]" value="<?php echo $categoryName; ?>" <?php if (is_array($categoryFilter) && in_array($categoryName, $categoryFilter)) echo 'checked'; ?>>
                <label class="form-check-label"><?php echo $categoryName; ?></label>
            </div>
            <?php
        }
        ?>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="stock" value="low" <?php if ($stockFilter) echo 'checked'; ?>>
            <label class="form-check-label">Low Stock</label>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <div class="row">
        <?php
        // Display products based on the filter
        while ($item = $result->fetch_assoc()) {
            ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="<?php echo $item['image_url']; ?>" class="card-img-top" alt="<?php echo $item['libelle']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['libelle']; ?></h5>
                        <p class="card-text">
                            Reference: <?php echo $item['reference']; ?><br>
                            Price: <?php echo $item['unit_price']; ?> DH<br>
                            Stock: <?php echo $item['quantite_stock']; ?><br>
                            Category: <?php echo $item['categorie']; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

   

</body>
</html>