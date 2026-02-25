const matrix = [
    [1, 2, 3, 4],
    [5, 10, 15, 20],
    [21, 22, 23, 24]
];

const table = document.querySelector("table");

// 1. Generáld ki a táblázatot a mátrixból!

for (const row of matrix){
    const tr = document.createElement("tr");
    for (const cell of row){
        const td = document.createElement("td");
        td.innerText = cell;
        tr.appendChild(td);
    }
    table.appendChild(tr);
}

table.innerHTML = matrix.map(row => `<tr>${
    row.map(cell => `<td>${cell}</td>`).join('')
}</tr>`).join('');

// 2. Ha egy cellára kattintok, duplázd meg a benne lévő számot!

function handleTdClick(e){
    if (e.target.matches('td'))
        e.target.innerText *= 2;
}

table.addEventListener("click", handleTdClick);