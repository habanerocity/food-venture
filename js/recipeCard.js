document.addEventListener('DOMContentLoaded', () => {

const addButtonListener = (buttonId, callback) => {
    const button = document.getElementById(buttonId);
    if(button){
        button.addEventListener('click', callback);
    }
}

//Print and share buttons
const printRecipe = () => {
    window.print();
  };

const shareOnFacebook = () => {
  const pageUrl = encodeURIComponent(window.location.href);
  const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${pageUrl}`;

  window.open(shareUrl, '_blank', 'width=600,height=400');
};

const shareOnWhatsApp = () => {
  const text =`Check out this interesting recipe! ${encodeURIComponent(window.location.href)}`;
  const whatsappUrl = `https://web.whatsapp.com/send?text=${encodeURIComponent(text)}`;

  window.open(whatsappUrl, '_blank');
}

const shareOnPinterest = () => {
  const pageUrl = encodeURIComponent(window.location.href); 
  const imageUrl = encodeURIComponent('URL_OF_THE_IMAGE_TO_SHARE'); 
  const description = encodeURIComponent('DESCRIPTION_OF_THE_CONTENT'); 

  const pinterestUrl = `https://www.pinterest.com/pin/create/button/?url=${pageUrl}&media=${imageUrl}&description=${description}`;

  window.open(pinterestUrl, '_blank');
}

addButtonListener('printBtn', printRecipe);
addButtonListener('fb', shareOnFacebook);
addButtonListener('whatsApp', shareOnWhatsApp);
addButtonListener('pinterest', shareOnPinterest);

//Increasing serving size
const ingredientQuantities = document.querySelectorAll('.ingredientQuantity');
const originalQuantities = Array.from(ingredientQuantities, el => el.innerText);  // Store the original quantities

const parseFraction = (fraction) => {
    const [numerator, denominator] = fraction.split('/');
    return numerator / denominator;
}

const decimalToFraction = (decimal, tolerance = 0.01) => {
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

const fractionToMixedNumber = (fraction) => {
    const [numerator, denominator] = fraction.split('/').map(Number);
    const wholeNumber = Math.floor(numerator / denominator);
    const remainder = numerator % denominator;

    if (wholeNumber === 0) {
        return `${remainder}/${denominator}`;
    } else if (remainder === 0) {
        return `${wholeNumber}`;
    } else {
        return `${wholeNumber} ${remainder}/${denominator}`;
    }
}

const resetQuantities = () => {
    for (let i = 0; i < ingredientQuantities.length; i++) {
        // Reset the quantity in the DOM to the original quantity
        ingredientQuantities[i].innerText = originalQuantities[i];
    }
}

const changeIngredientQuantity = (qty, multiplier) => {
    const changed = qty * multiplier;
    return changed;
}

const changeQuantities = (multiplier) => {
    for (let i = 0; i < ingredientQuantities.length; i++) {
        // Get the original quantity
        const ingredientQuantity = originalQuantities[i];

        let ingredientQuantityNumber;
        if (ingredientQuantity.includes('/')) {
            // The quantity is a fraction
            ingredientQuantityNumber = parseFraction(ingredientQuantity);
        } else {
            // The quantity is not a fraction
            ingredientQuantityNumber = Number(ingredientQuantity);
        }

        // Change the quantity
        const changed = changeIngredientQuantity(ingredientQuantityNumber, multiplier);
      
        if (!Number.isInteger(changed)) {
            const converted = decimalToFraction(changed);
            const [numerator, denominator] = converted.split('/').map(Number);
            if (numerator > denominator) {
                const mixedNumber = fractionToMixedNumber(converted);
                ingredientQuantities[i].innerText = mixedNumber;
            } else {
                ingredientQuantities[i].innerText = converted;
            }
        } else {
            ingredientQuantities[i].innerText = changed;
        }
    }
}

addButtonListener('doubleBtn', () => changeQuantities(2));
addButtonListener('tripleBtn', () => changeQuantities(3));
addButtonListener('resetBtn', resetQuantities);

//Dynamically add 'clicked' class to the multiplier buttons, and remove it from the others. Initialize 1x box as active.
const multiplierButtons = document.querySelectorAll('.recipe__card-ingredient_multiplier');

if(multiplierButtons && multiplierButtons.length > 0){
    // Add 'clicked' class to the 1x multiplier button
    multiplierButtons[0].classList.add('clicked');

    const servingsElement = document.querySelector('.recipe__card-servings');
    let baseServings;

    if(servingsElement){
        baseServings = Number(servingsElement.textContent); // Get the base servings coun
    }

    multiplierButtons.forEach(button => {
        button.addEventListener('click', function() {
            multiplierButtons.forEach(btn => btn.classList.remove('clicked')); // Remove 'clicked' class from all buttons
    
            this.classList.add('clicked'); // Add 'clicked' class to the clicked button
    
            const multiplier = Number(this.textContent.replace('x', '')); // Get the multiplier from the button's text
            const newServings = baseServings * multiplier; // Calculate the new servings count
    
            servingsElement.textContent = newServings; // Update the servings count in the DOM
        });
    });
}});