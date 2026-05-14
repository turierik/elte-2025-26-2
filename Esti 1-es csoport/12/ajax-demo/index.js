const table = document.querySelector("table");
const filterInput = document.querySelector("#filter");

async function renderTable(){
    const resp = await fetch("getVideos.php?filter=" + filterInput.value);
    const data = await resp.json();
    console.log(data);
    table.innerHTML = data.map(video => `<tr>
        <td>${video.id}</td>
        <td>${video.title}</td>
        <td>${video.nation}</td>
    </tr>`).join('');
}

renderTable();
filterInput.addEventListener("input", renderTable);