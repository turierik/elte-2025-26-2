// ESEMÉNYKEZELÉS TUTORIÁL

// 1.) jelöld ki az összes érintett elemet
// (bemenet, kimenet, kiváltó)

const numberSpan = document.querySelector("span");
const incButton = document.querySelector("button");

// 2.) írd meg az eseménykezelő fv-t

function handleIncButtonClick(){
    let number = Number(numberSpan.innerText);
    // let number = parseInt(numberSpan.innerText);
    // let number = +numberSpan.innerText;
    number += 1;
    numberSpan.innerText = number;
}

// 3.) eseményfigyelő regisztrálása
incButton.addEventListener("click", handleIncButtonClick);