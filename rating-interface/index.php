<!DOCTYPE html>
<html>
<head>
  <title>Product Information</title>
  <link rel="stylesheet" type="text/css" href="main.css">
  <script type="text/javascript" src="script.js" async></script>
</head>
<body>
  <div class="container">
    <h1>Product Rating Interface</h1>

    <div id="product-form">
      <h2>Edit Product</h2>
      <form method="POST" action="saveProduct.php">
        <input type="text" id="id" name="id" disabled hidden>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" disabled>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" disabled>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" disabled>

        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" disabled>

        <button type="submit" id="save-btn" disabled>Save</button>
      </form>
    </div>

    <div class="product-list">
      <?php
        // Read JSON file
        $jsonString = file_get_contents('products.json');
        $products = json_decode($jsonString, true);

        // Check if decoding was successful
        if ($products === null) {
          echo "Error decoding JSON file";
          exit;
        }

        // Display products
        foreach ($products as $key => $product) {
          echo '<div class="product" onclick="selectProduct(' . $key . ')">';
          echo '<h2>' . $product['name'] . '</h2>';
          echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
          echo '<p><strong>ID:</strong> ' . $product['id'] . '</p>';
          echo '<p><strong>Price:</strong> $' . $product['price'] . '</p>';
          echo '<p><strong>Quantity:</strong> ' . $product['quantity'] . '</p>';
          echo '<p><strong>Rating:</strong> ' . $product['rating'] . '</p>';
          echo '</div>';
        }
      ?>
    </div>

  </div>    
</body>
</html>

