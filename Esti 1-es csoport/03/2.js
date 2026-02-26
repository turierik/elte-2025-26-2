const matrix = [
    [1, 2, 3, 4],
    [5, 10, 15, 20],
    [7, 5, 3, 1]
];

// 1. Generálj táblázatot a mátrixból! table > tr > td
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
    row.map(cell => `<td>${cell}</td>`).join("")
}</tr>`).join("");

// 2. Ha egy cellára kattintok, duplázd meg benne számot!

function handleTdClick(e){
    if (e.target.matches('td'))
        e.target.innerText *= 2;
}

table.addEventListener("click", handleTdClick);

// 3. Ha egy sorra rámutatok (mouseover), legyen szines a háttere!

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
});

delegate(table, "mouseout", "tr", function(){
    this.style.backgroundColor = "";
});