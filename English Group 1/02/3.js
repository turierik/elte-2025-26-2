const numberInput = document.querySelector("input");
const guessButton = document.querySelector("button");
const resultSpan = document.querySelector("span");

const target = Math.floor(Math.random() * 100 + 1);

function handleGuessButtonClick(){
    const guess = Number(numberInput.value);
    if (guess < target)
        resultSpan.innerText = "Higher";
    else if (guess === target)
        resultSpan.innerText = "Correct";
    else
        resultSpan.innerText = "Lower";
}

guessButton.addEventListener("click", handleGuessButtonClick);