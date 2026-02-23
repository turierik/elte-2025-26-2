const matrix = [
    [2, 3, 4, 5],
    [10, 12, 14, 16],
    [20, 25, 30, 35]
];

const table = document.querySelector("table");

// 1. Generate a table from the matrix!

// for (const row of matrix){
//     const tr = document.createElement('tr');
//     for (const cell of row){
//         const td = document.createElement('td');
//         td.innerText = cell;
//         tr.appendChild(td);
//     }
//     table.appendChild(tr);
// }

table.innerHTML = matrix.map(row => `<tr>${
    row.map(cell => `<td>${cell}</td>`).join('')
}</tr>`).join('');

// 2. Simple delegation: When I click a cell,
// double the value in that cell

function doubleValue(e){
    if (e.target.matches('td'))
        e.target.innerText *= 2;
}

table.addEventListener("click", doubleValue);

// 3. Complex delegation: When I move the mouse
// over a row, change the bg color of that row

function delegate(parent, type, selector, handler) {
  parent.addEventListener(type, function (event) {
    const targetElement = event.target.closest(selector);

    if (this.contains(targetElement)) {
      handler.call(targetElement, event);
    }
  });
}

delegate(table, "mouseover", "tr", function(){
    this.style.backgroundColor = "yellow";
})

delegate(table, "mouseout", "tr", function(){
    this.style.backgroundColor = "";
})

// NEXT WEEK
// JS QUIZ: 10:20-10:40