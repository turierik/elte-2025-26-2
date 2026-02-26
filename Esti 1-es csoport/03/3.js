const sizeInput = document.querySelector("input");
const genButton = document.querySelector("button");
const table = document.querySelector("table");

function handleGenButtonClick(){
    const n = sizeInput.valueAsNumber;
    // table.innerHTML = "";
    // for (let i = 1; i <= n; i++){
    //     const tr = document.createElement("tr");
    //     for (let j = 1; j <= n; j++){
    //         const td = document.createElement("td");
    //         td.innerText = i * j;
    //         tr.appendChild(td);
    //     }
    //     table.appendChild(tr);
    // }
    table.innerHTML = [...Array(n).keys()].map(i => `<tr>${
        [...Array(n).keys()].map(j => `<td>${(i+1)*(j+1)}</td>`).join("")
    }</tr>`).join("");
}

genButton.addEventListener("click", handleGenButtonClick);