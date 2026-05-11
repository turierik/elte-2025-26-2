const filterInput = document.querySelector("#filter");
const table = document.querySelector("table");

async function renderTable(){
    const resp = await fetch("ajax.php?filter=" + filterInput.value);
    const data = await resp.json();
    table.innerHTML = data.map(d => `<tr>
        <td>${d.id}</td>
        <td>${d.title}</td>
        <td>${d.nation}</td>   
    </tr>`).join('');
}

renderTable();
filterInput.addEventListener("input", renderTable);
