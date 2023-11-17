<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>items</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style=" background-image:none ">

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
    <div class="row">
        <?php
        include_once 'getitems.php';

        $items = get_items();

        foreach ($items as $item) {
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