const table = document.querySelector("table");
const filter = document.querySelector("#filter");

async function renderTable(){
    const resp = await fetch("getVideos.php?filter=" + filter.value);
    const data = await resp.json();
    console.log(data);

    table.innerHTML = Object.values(data).map(d => `<tr>
        <td>${d.id}</td>
        <td>${d.title}</td>
        <td>${d.nation ? d.nation : "---" }</td>
    </tr>`).join('');
}

renderTable();
filter.addEventListener("input", renderTable);