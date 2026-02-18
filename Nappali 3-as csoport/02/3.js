const numberInput = document.querySelector("input");
const guessButton = document.querySelector("button");
const resultSpan = document.querySelector("span");

const target = Math.floor(Math.random() * 100 + 1);

function handleGuessButtonClick(){
    const guess = Number(numberInput.value);
    if (guess < 1 || guess > 100)
        resultSpan.innerText = "1-100 közötti egészre tippelj";
    else if (target > guess)
        resultSpan.innerText = "Nagyobbra gondoltam.";
    else if (target === guess)
        resultSpan.innerText = "Eltaláltad!";
    else
        resultSpan.innerText = "Kisebbre gondoltam.";
}

guessButton.addEventListener("click", handleGuessButtonClick);
