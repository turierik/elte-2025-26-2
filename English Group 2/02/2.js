// EVENT HANDLING TUTORIAL

// Step 1: select all elements that are involved in the event (inputs, output, trigger)
const numberSpan = document.querySelector("span");
const incButton = document.querySelector("button");

// Step 2: write the function that does what needs to be done (event handler)
function handleIncButtonClick(){
    let number = Number(numberSpan.innerText);
    // let number = parseInt(numberSpan.innerText);
    // let number = +numberSpan.innerText;
    number += 1;
    numberSpan.innerText = number;
}

// Step 3: when to run the function? (event listener)
incButton.addEventListener("click", handleIncButtonClick);