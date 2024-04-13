let popup = document.getElementById('popup');
let elemtsForCart = {};
let currentProductIndex = -1; 

function openPopup() {
  $('html').css('overflow-y', 'hidden');
  popup.classList.add('open-popup');
}

function closePopup() {
  popup.classList.remove('open-popup');
  $('html').css('overflow-y', 'scroll');
}

document.addEventListener('DOMContentLoaded', function () {
  let firstParagraph1 = document.querySelectorAll(".linkToBuy");

  firstParagraph1.forEach(element => {
    element.addEventListener("click", (event) => {
      var clickedElement = event.currentTarget;
      var selectImage = clickedElement.querySelector("img").src;
      var elmentName = clickedElement.querySelector('.card-title').innerHTML;
      var elementPrice = clickedElement.querySelector('.card-text').innerHTML;

      document.querySelector(".productImage").src = selectImage;
      document.querySelector(".productName").innerHTML = elmentName;
      document.querySelector(".prductPrice").innerHTML = elementPrice;
      
      currentProductIndex = Array.from(firstParagraph1).indexOf(clickedElement);
      console.log(currentProductIndex);
      openPopup();
    });
  });

  document.querySelector('.productDetails').addEventListener('click', function () {
    if (currentProductIndex !== -1) {
      const modalBody = document.querySelector('.modal-body');
      modalBody.innerHTML = '';
      const listElement = document.createElement('ul');

      const productDetailsArray = [
        "Type 1\n-Leather free.\n-Mesh and nylon.\n-Printed logo on the exterior.\nEmbossed logo on the tongue.\n-Material: 75% polyurethane, 21% polyester, 4% nylon.",
        // Add more product details here
      ];

      productDetailsArray[currentProductIndex]
        .split('\n')
        .map(line => line.trim())
        .forEach(line => {
          if (line) {
            const listItem = document.createElement('li');
            listItem.innerHTML = line;
            listElement.appendChild(listItem);
          }
        });

      modalBody.appendChild(listElement);
    } else {
      console.error('Please select a product first.');
    }
  });
});

const myForm = document.getElementById('formDetails');

myForm.addEventListener('submit', function (event) {
  event.preventDefault();
});

// Add a class to the body element when on the checkout page
document.body.classList.add('checkout-page');
