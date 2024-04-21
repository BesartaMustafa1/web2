<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Town Library Online - FAQs</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
  @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');

* {
  box-sizing: border-box;
}

body {
  background-color: #f4f7f6;
  font-family: 'Muli', sans-serif;
}

h1 {
  margin: 50px 0 30px;
  text-align: center;
  color: #333;
}

.faqs-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.faq {
  background-color:floralwhite;
  border: 2px solid #ccc;
  border-radius: 10px;
  padding: 30px;
  position: relative;
  overflow: hidden;
  margin: 20px 0;
  transition: 0.3s ease;
  max-width: 600px;
  width: 100%;
  box-sizing: border-box;
}

.faq.active {
  background-color: #cce9fb;
  box-shadow: 0 3px 6px rgba(0,0,0,0.1), 0 3px 6px rgba(0,0,0,0.1);
}

.faq.active::after,
.faq.active::before {
  color: #2ecc71;
  content: '\f075';
  font-family: 'Font Awesome 5 Free';
  font-size: 7rem;
  position: absolute;
  opacity: 0.2;
  top: 20px;
  left: 20px;
  z-index: 0;
}

.faq.active::before {
  color: #f1aedf;
  top: -10px;
  left: -30px;
  transform: rotateY(180deg);
}

.faq-title {
  margin: 0;
  text-align: center;
}

.faq-text {
  display: none;
  text-align: center;
}

.faq.active .faq-text {
  display: block;
}

.faq-toggle {
  background-color: transparent;
  border: none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  padding: 0;
  position: absolute;
  top: 30px;
  right: 30px;
  height: 30px;
  width: 30px;
}

.faq-toggle:focus {
  outline: none;
}

.faq.active .faq-toggle {
  background-color: #9FA4A8;
}

.faq-toggle .fa-times {
  display: none;
}

.faq.active .faq-toggle .fa-times {
  display: block;
}

.faq-toggle .fa-chevron-down {
  color: #83888E;
}

.faq.active .faq-toggle .fa-chevron-down {
  display: none;
}

/* SOCIAL PANEL CSS */
.social-panel-container {
  position: fixed;
  right: 0;
  bottom: 80px;
  transform: translateX(100%);
  transition: transform 0.4s ease-in-out;
}

.social-panel-container.visible {
  transform: translateX(-10px);
}

.social-panel { 
  background-color: #fff;
  border-radius: 16px;
  box-shadow: 0 16px 31px -17px rgba(0,31,97,0.6);
  border: 5px solid #001F61;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-family: 'Muli';
  position: relative;
  height: 169px;  
  width: 370px;
  max-width: calc(100% - 10px);
}

.social-panel button.close-btn {
  border: 0;
  color: #97A5CE;
  cursor: pointer;
  font-size: 20px;
  position: absolute;
  top: 5px;
  right: 5px;
}

.social-panel button.close-btn:focus {
  outline: none;
}

.social-panel p {
  background-color: #001F61;
  border-radius: 0 0 10px 10px;
  color: #fff;
  font-size: 14px;
  line-height: 18px;
  padding: 2px 17px 6px;
  position: absolute;
  top: 0;
  left: 50%;
  margin: 0;
  transform: translateX(-50%);
  text-align: center;
  width: 235px;
}

.social-panel p i {
  margin: 0 5px;
}

.social-panel p a {
  color: #FF7500;
  text-decoration: none;
}

.social-panel h4 {
  margin: 20px 0;
  color: #97A5CE; 
  font-family: 'Muli';  
  font-size: 14px;  
  line-height: 18px;
  text-transform: uppercase;
}

.social-panel ul {
  display: flex;
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.social-panel ul li {
  margin: 0 10px;
}

.social-panel ul li a {
  border: 1px solid #DCE1F2;
  border-radius: 50%;
  color: #001F61;
  font-size: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50px;
  width: 50px;
  text-decoration: none;
}

.social-panel ul li a:hover {
  border-color: #FF6A00;
  box-shadow: 0 9px 12px -9px #FF6A00;
}

.floating-btn {
  border-radius: 26.5px;
  background-color: #001F61;
  border: 1px solid #001F61;
  box-shadow: 0 16px 22px -17px #03153B;
  color: #fff;
  cursor: pointer;
  font-size: 16px;
  line-height: 20px;
  padding: 12px 20px;
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 999;
}

.floating-btn:hover {
  background-color: #ffffff;
  color: #001F61;
}

.floating-btn:focus {
  outline: none;
}

.floating-text {
  background-color: #001F61;
  border-radius: 10px 10px 0 0;
  color: #fff;
  font-family: 'Muli';
  padding: 7px 15px;
  position: fixed;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  text-align: center;
  z-index: 998;
}

.floating-text a {
  color: #FF7500;
  text-decoration: none;
}

@media screen and (max-width: 480px) {

  .social-panel-container.visible {
    transform: translateX(0px);
  }
}
</style>
<body>
<h1>Frequently Asked Questions</h1>

<div class="faqs-container">
  <div class="faq active">
    <h3 class="faq-title">
      How can I reserve a study place at the Town Library Online?
    </h3>
    <p class="faq-text">
      You can reserve a study place by logging into your account and selecting the desired date and time slot in the reservation section.
    </p>
    <button class="faq-toggle">
      <i class="fas fa-chevron-down"></i>
      <i class="fas fa-times"></i>
    </button>
  </div>
  
  <div class="faq">
    <h3 class="faq-title">
      Can I reserve books online at the Town Library?
    </h3>
    <p class="faq-text">
      Yes, you can reserve books online through the library's website. Simply search for the book you want and click on the "Reserve" button.
    </p>
    <button class="faq-toggle">
      <i class="fas fa-chevron-down"></i>
      <i class="fas fa-times"></i>
    </button>
  </div>
  
  <div class="faq">
    <h3 class="faq-title">
      How long can I keep a reserved book?
    </h3>
    <p class="faq-text">
      You can keep a reserved book for up to 14 days. After that, it will be made available to other users.
    </p>
    <button class="faq-toggle">
      <i class="fas fa-chevron-down"></i>
      <i class="fas fa-times"></i>
    </button>
  </div>
  
  <div class="faq">
    <h3 class="faq-title">
      Can I renew my book loan online?
    </h3>
    <p class="faq-text">
      Yes, you can renew your book loan online if there are no pending reservations for the book.
    </p>
    <button class="faq-toggle">
      <i class="fas fa-chevron-down"></i>
      <i class="fas fa-times"></i>
    </button>
  </div>
  
  <div class="faq">
    <h3 class="faq-title">
      How do I contact support for assistance?
    </h3>
    <p class="faq-text">
      You can contact our support team via email at support@townlibraryonline.com or by phone at +1 (800) 123-4567.
    </p>
    <button class="faq-toggle">
      <i class="fas fa-chevron-down"></i>
      <i class="fas fa-times"></i>
    </button>
  </div>
</div>

<!-- SOCIAL PANEL HTML -->
<div class="social-panel-container">
  <div class="social-panel">
    <p><i class="fa fa-heart"></i> by
      <a target="_blank" href="https://florin-pop.com"></a></p>
    <button class="close-btn"><i class="fas fa-times"></i></button>
    <h4>Get in touch on</h4>
    <ul>
      <li>
        <a href="https://twitter.com/florinpop1705" target="_blank">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li>
        <a href="https://linkedin.com/in/florinpop17" target="_blank">
          <i class="fab fa-linkedin"></i>
        </a>
      </li>
      <li>
        <a href="https://facebook.com/florinpop17" target="_blank">
          <i class="fab fa-facebook"></i>
        </a>
      </li>
      <li>
        <a href="https://instagram.com/florinpop17" target="_blank">
          <i class="fab fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>
</div>
<button class="floating-btn">
  Get in Touch
</button>

<div class="floating-text">
  Part of <a href="https://florin-pop.com/blog/2019/09/100-days-100-projects" target="_blank"></a>
</div>
<script>
    const toggles = document.querySelectorAll('.faq-toggle');

toggles.forEach(toggle => {
  toggle.addEventListener('click', () => {
    toggle.parentNode.classList.toggle('active');
  });
});

// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
  social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
  social_panel_container.classList.remove('visible')
});
</script>
</body>
</html>
