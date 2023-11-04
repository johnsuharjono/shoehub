<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/about.css'>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  include_once 'components/navbar.php';
  ?>

  <div class="page-wrapper">
    <div class="content-wrapper">
      <div class="about-us-image-wrapper">
        <div class="overlay-text">
          <h1>About Us</h1>
          <p>ShoeHub is a Singapore-based footwear retailer that offers a diverse collection of stylish and functional footwear in various sizes.</p>
        </div>
        <img class="main-image" alt='main-image' src='https://source.unsplash.com/unpaired-orange-and-white-nike-air-huarache-JzJSybPFb3s'>
      </div>

      <section class="text-section">
        <img alt='our-mission-image' src='https://source.unsplash.com/blue-trainers-on-colorful-leaves-on-the-ground-autumn-nature-kYfWXbyuh-s' />
        <div class="text-body">
          <h2>Our Story</h2>
          <div class="text-description">
            <p>
              ShoeHub's journey is driven by our deep love for shoes. As two enthusiastic undergraduates, we set out to share our passion for exceptional footwear with the world.
            </p>
            <p>
              Our commitment is to provide high-quality, stylish shoes in various sizes and functions, all curated with care and a keen eye for detail. Beyond products, we're creating a vibrant community of shoe enthusiasts who understand the power of great footwear
            </p>
            <p>
              Join us on our journey as we continue to explore the world of shoes and share our love for fine craftsmanship and unique style.
            </p>
          </div>
        </div>
      </section>

      <section class="text-section">
        <div class="text-body">
          <h2>Our Mission</h2>
          <div class="text-description">
            <p>
              ShoeHub's journey is fueled by a profound love for footwear. We set out with a mission to transform the way the world experiences shoes. We believe that shoes are more than just garments; they're a reflection of personal style, comfort, and individuality.
            </p>
            <p>
              As fellow shoe enthusiasts, we understand the deep connection people have with their footwear. Our commitment is to provide a diverse collection of high-quality, stylish shoes in various sizes and functions. Beyond products, we're building a community of shoe lovers who share our passion.
            </p>
            <p>
              Our vision is simple: to be the ultimate destination for shoe aficionados, making every step in a ShoeHub pair a step toward self-expression and satisfaction."
            </p>
          </div>
        </div>
        <img alt='our-mission-image' src='https://source.unsplash.com/close-up-photography-of-person-wears-brown-and-white-nike-air-max-j1GiPlvSGWI' />
      </section>

      <section class="find-us-wrapper">
        <img alt='our-location' src='assets/map.png' />
        <div class="find-us-body">
          <h2>Find us</h2>
          <div class="find-us-description">
            <p>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4L11.07 21L13.58 13.61L21 11.07L4 4Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              20 Nanyang Ave, Singapore 639089
            </p>

            <p>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 3H6C4.89543 3 4 3.89543 4 5V17C4 18.1046 4.89543 19 6 19H18C19.1046 19 20 18.1046 20 17V5C20 3.89543 19.1046 3 18 3Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4 11H20" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 3V11" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8 19L6 22" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M18 22L16 19" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              Nearest MRT Station: Boon Lay MRT
            </p>

            <p>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 4H4C2.89543 4 2 4.89543 2 6V18C2 19.1046 2.89543 20 4 20H20C21.1046 20 22 19.1046 22 18V6C22 4.89543 21.1046 4 20 4Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M22 7L13.03 12.7C12.7213 12.8934 12.3643 12.996 12 12.996C11.6357 12.996 11.2787 12.8934 10.97 12.7L2 7" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              admin@shoehub.com
            </p>

            <p>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 16.9201V19.9201C22.0011 20.1986 21.9441 20.4743 21.8325 20.7294C21.7209 20.9846 21.5573 21.2137 21.3521 21.402C21.1469 21.5902 20.9046 21.7336 20.6408 21.8228C20.3769 21.912 20.0974 21.9452 19.82 21.9201C16.7428 21.5857 13.787 20.5342 11.19 18.8501C8.77383 17.3148 6.72534 15.2663 5.19 12.8501C3.49998 10.2413 2.44824 7.27109 2.12 4.1801C2.09501 3.90356 2.12788 3.62486 2.2165 3.36172C2.30513 3.09859 2.44757 2.85679 2.63477 2.65172C2.82196 2.44665 3.04981 2.28281 3.30379 2.17062C3.55778 2.05843 3.83234 2.00036 4.11 2.0001H7.11C7.59531 1.99532 8.06579 2.16718 8.43376 2.48363C8.80173 2.80008 9.04208 3.23954 9.11 3.7201C9.23662 4.68016 9.47145 5.62282 9.81 6.5301C9.94455 6.88802 9.97366 7.27701 9.89391 7.65098C9.81415 8.02494 9.62886 8.36821 9.36 8.6401L8.09 9.9101C9.51356 12.4136 11.5865 14.4865 14.09 15.9101L15.36 14.6401C15.6319 14.3712 15.9752 14.1859 16.3491 14.1062C16.7231 14.0264 17.1121 14.0556 17.47 14.1901C18.3773 14.5286 19.3199 14.7635 20.28 14.8901C20.7658 14.9586 21.2094 15.2033 21.5265 15.5776C21.8437 15.9519 22.0122 16.4297 22 16.9201Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              +65 8123 4567
            </p>
          </div>
      </section>
    </div>
  </div>

  <?php
  include_once 'components/footer.php';
  ?>

</body>

</html>