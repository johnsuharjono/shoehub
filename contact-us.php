<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoehub</title>
  <link rel='stylesheet' href='css/reset.css'>
  <link rel="stylesheet" href="css/global.css">
  <link rel='stylesheet' href='css/contact-us.css'>
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
      <div class="contact-form-container">
        <h1>Contact Us</h1>
        <form class="contact-form">
          <div class="form-group">
            <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
            <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
          </div>
          <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="tel" id="phone" name="phone" placeholder="Phone Number">
          </div>
          <div class="form-group">
            <textarea id="message" name="message" placeholder="Message" required></textarea>
          </div>
          <button type="submit" class="global-button submit-button">Submit</button>
        </form>
      </div>

      <div class="faq-container">
        <h1>Frequently Asked Questions</h1>
        <div class="accordion">
          <div class="accordion-item">
            <div class="accordion-header">
              What payment methods do you accept?
              <span class="arrow"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.5 7L10.5 13L4.5 7" stroke="#4F5D64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </span>
            </div>
            <div class="accordion-content">We accept Visa, MasterCard, American Express, and PayPal.</div>
          </div>
          <div class="accordion-item">
            <div class="accordion-header">
              How long does shipping take?
              <span class="arrow"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.5 7L10.5 13L4.5 7" stroke="#4F5D64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </span>
            </div>
            <div class="accordion-content">Shipping times may vary, but typically, orders are delivered within 5-7 business days.</div>
          </div>
          <div class="accordion-item">
            <div class="accordion-header">
              What is your return policy?
              <span class="arrow"><svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.5 7L10.5 13L4.5 7" stroke="#4F5D64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </span>
            </div>
            <div class="accordion-content">We offer a 30-day return policy. If you're not satisfied with your purchase, you can return it for a full refund.</div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <?php
  include_once 'components/footer.php';
  ?>

</body>

</html>

<script>
  const accordionItems = document.querySelectorAll(".accordion-item");

  accordionItems.forEach((item) => {
    const header = item.querySelector(".accordion-header");
    const content = item.querySelector(".accordion-content");
    const arrow = item.querySelector(".arrow");

    header.addEventListener("click", () => {
      item.classList.toggle("active");
      if (item.classList.contains("active")) {
        content.style.maxHeight = content.scrollHeight + "px";
        arrow.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8" fill="none">
  <path d="M1.5 7L7.5 1L13.5 7" stroke="#4F5D64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>`
      } else {
        content.style.maxHeight = 0;
        arrow.innerHTML = `<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.5 7L10.5 13L4.5 7" stroke="#4F5D64" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`; // Downward arrow
      }
    });
  });
  document.querySelector(".submit-button").addEventListener("click", function() {
    // Get form data
    const firstName = document.getElementById("first-name").value;
    const lastName = document.getElementById("last-name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const message = document.getElementById("message").value;

    // Construct the mailto link
    const mailtoLink = "mailto:admin@shoehub.com" + "?subject=ShoeHub Contact Us&body=First Name: " + firstName + "%0D%0ALast Name: " + lastName + "%0D%0AEmail: " + email + "%0D%0APhone: " + phone + "%0D%0AMessage: " + message;
    console.log(mailtoLink)

    // Open the default email client with the pre-filled content
    window.location.href = mailtoLink;
  });
</script>