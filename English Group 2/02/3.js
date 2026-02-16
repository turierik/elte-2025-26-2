const numberInput = document.querySelector("input");
const guessButton = document.querySelector("button");
const resultSpan = document.querySelector("span");

const target = Math.floor(Math.random() * 100 + 1);

function handleGuessButtonClick(){
    const guess = numberInput.valueAsNumber;
    if (target > guess)
        resultSpan.innerText = "Higher";
    else if (target === guess)
        resultSpan.innerText = "Correct";
    else if (target < guess)
        resultSpan.innerText = "Lower";
    else
        resultSpan.innerText = "???";
}

guessButton.addEventListener("click", handleGuessButtonClick);