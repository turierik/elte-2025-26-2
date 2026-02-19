// ESEMÉNYKEZELÉS TUTORIÁL

// 1.) jelöld ki az összes érintett elemet
// (bemenet, kimenet, kiváltó)
const numberSpan = document.querySelector('span');
const incButton = document.querySelector('button');

// 2.) írd meg az eseménykezelő fv-t

function handleIncButtonClick(){
    let counter = Number(numberSpan.innerText);
    // let counter = parseInt(numberSpan.innerText);
    // let counter = +numberSpan.innerText;
    counter += 1;
    numberSpan.innerText = counter;
}

// 3.) regisztráld az eseményfigyelőt

incButton.addEventListener("click", handleIncButtonClick);