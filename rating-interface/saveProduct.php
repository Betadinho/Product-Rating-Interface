<?php
function saveProductChanges($productId, $updatedProductData) {
  // Read JSON file
  $jsonString = file_get_contents('products.json');
  $data = json_decode($jsonString, true);

  // Check if decoding was successful
  if ($data === null) {
    echo "Error decoding JSON file";
    exit;
  }

  $products = $data;

  // Find the product by ID and update its data
  foreach ($products as &$product) {
    if ($product['id'] == $productId) {
      $product = array_merge($product, $updatedProductData);
      break;
    }
  }

  // Encode the updated data back to JSON
  $updatedJsonString = json_encode($products, JSON_PRETTY_PRINT);

  // Save the updated JSON string back to the file
  file_put_contents('products.json', $updatedJsonString);
}

if (isset($_POST)) {

  $productId = (int)$_POST['id'];

  $updatedProductData = [
    'name' => $_POST['name'],
    'quantity' => (int)$_POST['quantity'],
    'price' => (int)$_POST['price'],
    'rating' => (int)$_POST['rating'],
  ];

  saveProductChanges($productId, $updatedProductData);
}


header("Location: /rating-interface");

?>