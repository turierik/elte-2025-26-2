const inputA = document.querySelector("#a");
const inputB = document.querySelector("#b");
const inputOp = document.querySelector("#op");
const calcButton = document.querySelector("button");
const resultSpan = document.querySelector("span");

function calculate(){
    const a = inputA.valueAsNumber;
    const b = inputB.valueAsNumber;
    const op = inputOp.value;
    let res;
    if (op === "add") res = a + b;
    else if (op === "sub") res = a - b;
    else if (op === "mul") res = a * b;
    else if (op === "div") res = a / b;
    resultSpan.innerText = res;
}

calcButton.addEventListener("click", calculate);
inputA.addEventListener("input", calculate);
inputB.addEventListener("input", calculate);
inputOp.addEventListener("input", calculate);