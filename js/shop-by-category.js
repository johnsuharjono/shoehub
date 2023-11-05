const casual = document.getElementById('casual-category-card');
const running = document.getElementById('running-category-card');
const luxury = document.getElementById('luxury-category-card');

casual.addEventListener('click', function () {
  window.location.href =
    'products.php?searchbar-input=&category%5B%5D=casual&min-price=0&max-price=1000&SUBMIT=APPLY';
});

running.addEventListener('click', function () {
  window.location.href =
    'products.php?searchbar-input=&category%5B%5D=running&min-price=0&max-price=1000&SUBMIT=APPLY';
});

luxury.addEventListener('click', function () {
  window.location.href =
    'products.php?searchbar-input=&category%5B%5D=luxury&min-price=0&max-price=1000&SUBMIT=APPLY';
});
