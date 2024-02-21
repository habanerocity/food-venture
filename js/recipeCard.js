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

let originalQuantities = Array.from(ingredientQuantities, el => el.innerText);  // Store the original quantities

function parseFraction(fraction) {
    let [numerator, denominator] = fraction.split('/');
    return numerator / denominator;
}

function decimalToFraction(decimal, tolerance = 0.01) {
    let numerator = 1;
    let h1 = 0;
    let denominator = 0;
    let h2 = 1;
    let b = decimal;
    do {
        let a = Math.floor(b);
        let aux = numerator;
        numerator = a * numerator + h1;
        h1 = aux;
        aux = denominator;
        denominator = a * denominator + h2;
        h2 = aux;
        if (decimal > 0) {
            b = 1 / (b - a);
        } else {
            b = -1 / (b + a);
        }
    } while (Math.abs(decimal - numerator / denominator) > decimal * tolerance);

    return `${numerator}/${denominator}`;
}

function fractionToMixedNumber(fraction) {
    let [numerator, denominator] = fraction.split('/').map(Number);
    let wholeNumber = Math.floor(numerator / denominator);
    let remainder = numerator % denominator;
    if (wholeNumber === 0) {
        return `${remainder}/${denominator}`;
    } else if (remainder === 0) {
        return `${wholeNumber}`;
    } else {
        return `${wholeNumber} ${remainder}/${denominator}`;
    }
}

function isMixedNumber(number) {
    return number.includes(' ') && number.includes('/');
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
    convertUnitsToPlural();
});

tripleButton.addEventListener('click', function(){
    changeQuantities(3);
    convertUnitsToPlural();
});

resetButton.addEventListener('click', function(){
    for (let i = 0; i < ingredientQuantities.length; i++) {
        // Reset the quantity in the DOM to the original quantity
        ingredientQuantities[i].innerText = originalQuantities[i];
    }
    convertUnitsToPlural();
});

function changeQuantities(multiplier) {
    for (let i = 0; i < ingredientQuantities.length; i++) {
        // Get the original quantity
        let ingredientQuantity = originalQuantities[i];

        let ingredientQuantityNumber;
        if (ingredientQuantity.includes('/')) {
            // The quantity is a fraction
            ingredientQuantityNumber = parseFraction(ingredientQuantity);
        } else {
            // The quantity is not a fraction
            ingredientQuantityNumber = Number(ingredientQuantity);
        }
        console.log(ingredientQuantityNumber);

        // Change the quantity
        let changed = changeIngredientQuantity(ingredientQuantityNumber, multiplier);
        console.log(changed);
      
        if (!Number.isInteger(changed)) {
            let converted = decimalToFraction(changed);
            let [numerator, denominator] = converted.split('/').map(Number);
            if (numerator > denominator) {
                let mixedNumber = fractionToMixedNumber(converted);
                ingredientQuantities[i].innerText = mixedNumber;
            } else {
                ingredientQuantities[i].innerText = converted;
            }
        } else {
            ingredientQuantities[i].innerText = changed;
        }
    }
}

//Convert units to plural
function convertUnitsToPlural() {
    let ingredientUnits = document.querySelectorAll('.measurement');

    for (let i = 0; i < ingredientQuantities.length; i++) {
        // Get the quantity and unit
        let quantity = Number(ingredientQuantities[i].innerText);
        let unit = ingredientUnits[i].innerText;

        // If the quantity is greater than 1 and the unit does not already end with an 's', add an 's' to the end of the unit
        if (quantity > 1 && !unit.endsWith('s')) {
            unit += 's';
        } else if (quantity <= 1 && unit.endsWith('s')) {
            // If the quantity is 1 or less and the unit ends with an 's', remove the 's' at the end of the unit
            unit = unit.slice(0, -1);
        }

        // Update the unit in the DOM
        ingredientUnits[i].innerText = unit;
    }
}

