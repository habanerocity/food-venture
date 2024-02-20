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

let originalQuantities = Array.from(ingredientQuantities, el => el.innerText); // Store the original quantities

function parseFraction(fraction) {
    let [numerator, denominator] = fraction.split('/');
    return numerator / denominator;
}

function changeIngredientQuantity(qty, multiplier){
    let changed = qty * multiplier;
    console.log(changed);
    return changed;
}

const doubleButton = document.getElementById('doubleBtn');
const tripleButton = document.getElementById('tripleBtn');
const resetButton = document.getElementById('resetBtn');

doubleButton.addEventListener('click', function(){
    changeQuantities(2);
});

tripleButton.addEventListener('click', function(){
    changeQuantities(3);
});

resetButton.addEventListener('click', function(){
    for (let i = 0; i < ingredientQuantities.length; i++) {
        // Reset the quantity in the DOM to the original quantity
        ingredientQuantities[i].innerText = originalQuantities[i];
    }
});

function changeQuantities(multiplier) {
    for (let i = 0; i < ingredientQuantities.length; i++) {
        
        let ingredientQuantity = originalQuantities[i]; // Get the original quantity

        let ingredientQuantityNumber;
        if (ingredientQuantity.includes('/')) {
            ingredientQuantityNumber = parseFraction(ingredientQuantity); // The quantity is a fraction, conver to a decimal
        } else {
            ingredientQuantityNumber = Number(ingredientQuantity); // The quantity is not a fraction, convert to a number
        }

        let changed = changeIngredientQuantity(ingredientQuantityNumber, multiplier); // Change the quantity

        ingredientQuantities[i].innerText = changed; // Update the quantity in the DOM
    }
}