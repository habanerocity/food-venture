//Selecting DOM Nodes
const printButton = document.getElementById('printBtn');
const fbButton = document.getElementById('fb');
const whatsAppButton = document.getElementById('whatsApp');
const pinterestButton = document.getElementById('pinterest');

printButton.addEventListener('click', printRecipe);
fbButton.addEventListener('click', shareOnFacebook );
whatsAppButton.addEventListener('click', shareOnWhatsApp );
pinterestButton.addEventListener('click', shareOnPinterest );

//Print and share buttons

function printRecipe(){
  window.print();
};

function shareOnFacebook(){
  const pageUrl = encodeURIComponent(window.location.href);
  const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${pageUrl}`;

  window.open(shareUrl, '_blank', 'width=600,height=400');
};

function shareOnWhatsApp() {
  const text = "Check out this amazing recipe! " +             encodeURIComponent(window.location.href);
  const whatsappUrl = `https://web.whatsapp.com/send?text=${encodeURIComponent(text)}`;

  window.open(whatsappUrl, '_blank');
}

function shareOnPinterest() {
  const pageUrl = encodeURIComponent(window.location.href); 
  const imageUrl = encodeURIComponent('URL_OF_THE_IMAGE_TO_SHARE'); 
  const description = encodeURIComponent('DESCRIPTION_OF_THE_CONTENT'); 

  const pinterestUrl = `https://www.pinterest.com/pin/create/button/?url=${pageUrl}&media=${imageUrl}&description=${description}`;

  window.open(pinterestUrl, '_blank');
}

//Increasing serving size

let ingredientQuantities = document.querySelectorAll('.ingredientQuantity');

function parseFraction(fraction) {
    let [numerator, denominator] = fraction.split('/');
    return numerator / denominator;
}

function doubleIngredientQuantity(qty){
    let doubled = qty * 2;
    console.log(doubled);
    return doubled;
}

const doubleButton = document.getElementById('doubleBtn');

doubleButton.addEventListener('click', function(){
    for (let i = 0; i < ingredientQuantities.length; i++) {
        // Get the current quantity
        let ingredientQuantity = ingredientQuantities[i].innerText;

        let ingredientQuantityNumber;
        if (ingredientQuantity.includes('/')) {
            // The quantity is a fraction
            ingredientQuantityNumber = parseFraction(ingredientQuantity);
        } else {
            // The quantity is not a fraction
            ingredientQuantityNumber = Number(ingredientQuantity);
        }
        console.log(ingredientQuantityNumber);

        // Double the quantity of ingredients
        let doubled = doubleIngredientQuantity(ingredientQuantityNumber);
        console.log(doubled);

        // Update the quantity in the DOM
        ingredientQuantities[i].innerText = doubled;
    }
});