// JavaScript code for selecting and editing a product
var selectedProduct = null;

function selectProduct(key) {
  if (selectedProduct !== null) {
    selectedProduct.classList.remove("selected");
  }
  selectedProduct = document.getElementsByClassName("product")[key];
  selectedProduct.classList.add("selected");

  document.getElementById("name").value =
    selectedProduct.getElementsByTagName("h2")[0].innerText;

  document.getElementById("id").value = selectedProduct
    .getElementsByTagName("p")[0]
    .innerText.replace("ID: ", "");

  document.getElementById("price").value = selectedProduct
    .getElementsByTagName("p")[1]
    .innerText.replace("Price: $", "");

  document.getElementById("quantity").value = selectedProduct
    .getElementsByTagName("p")[2]
    .innerText.replace("Quantity: ", "");
    
  document.getElementById("rating").value = selectedProduct
    .getElementsByTagName("p")[3]
    .innerText.replace("Rating: ", "");

  document.getElementById("name").disabled = false;
  document.getElementById("id").disabled = false;
  document.getElementById("price").disabled = false;
  document.getElementById("quantity").disabled = false;
  document.getElementById("rating").disabled = false;
  document.getElementById("save-btn").disabled = false;
}
