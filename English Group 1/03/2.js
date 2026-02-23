const matrix = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [10, 15, 20, 25]
];

// 1.) Generate a table from this matrix!
// 2.) When I click on a cell, double the value in that cell!
// 3.) When I move my mouse over a row, change its background color.
// (--> smart-short delegate function)

const table = document.querySelector("table");

// for (const row of matrix){
//     const tr = document.createElement("tr");
//     for (const cell of row){
//         const td = document.createElement("td");
//         td.innerText = cell;
//         tr.appendChild(td);
//     }
//     table.appendChild(tr);
// }

table.innerHTML = matrix.map(row => `<tr>${
    row.map(cell => `<td>${cell}</td>`).join('')
}</tr>`).join('');

function doubleValue(e){
    if (e.target.matches('td')){
        e.target.innerText *= 2;
    }
}

table.addEventListener("click", doubleValue);

delegate(table, "mouseover", "tr", function(){
    this.style.backgroundColor = "yellow";
})

delegate(table, "mouseout", "tr", function(){
    this.style.backgroundColor = "";
})

function delegate(parent, type, selector, handler) {
  parent.addEventListener(type, function (event) {
    const targetElement = event.target.closest(selector);

    if (this.contains(targetElement)) {
      handler.call(targetElement, event);
    }
  });
}