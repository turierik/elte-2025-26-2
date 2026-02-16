// EVENT HANDLING TUTORIAL :)

// Step 1: select all the elemens that are in the event (inputs, outputs, trigger)
const numberSpan = document.querySelector("span");
const incButton = document.querySelector("button");

// Step 2: write a function that does what needs to be done (event handler function)
function handleIncButtonClick(){
    let number = Number(numberSpan.innerText);
    // let number = parseInt(numberSpan.innerText);
    // let number = +numberSpan.innerText;
    number += 1;
    numberSpan.innerText = number;
}

// Step 3: when will this function run? (event listener)
incButton.addEventListener("click", handleIncButtonClick);
