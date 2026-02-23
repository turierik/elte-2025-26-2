const aInput = document.querySelector("#a");
const bInput = document.querySelector("#b");
const opInput = document.querySelector("#op");
const calcButton = document.querySelector("button");
const resultSpan = document.querySelector("span");

function calculate(){
    const a = aInput.valueAsNumber;
    const b = bInput.valueAsNumber;
    const op = opInput.value;
    let x;
    if (op === "add") x = a + b;
    else if (op === "sub") x = a - b;
    else if (op === "mul") x = a * b;
    else if (op === "div") x = a / b;
    resultSpan.innerText = x;
}

calcButton.addEventListener("click", calculate);