const videoTable = document.querySelector('#video-table')
const videoTableBody = document.querySelector('#video-table tbody')
const viewInput = document.querySelector('#amount')
const btnAdd = document.querySelector('#btn-add')
const btnSub = document.querySelector('#btn-sub')
const sumSpan = document.querySelector('#sum')

for (const video of data)
    video.selected = false;

function render(){
    videoTableBody.innerHTML = 
        data.map(video => `<tr class="${video.selected ? 'selected' : ''}">
            <td>${video.year}</td>
            <td>${video.title}</td>
            <td>${video.views} million</td>
            </tr>`)
        .join('');
}

render();

videoTableBody.addEventListener("click", function(e){
    if (e.target.matches("td")){
        const tr = e.target.parentElement;
        data[tr.sectionRowIndex].selected = !data[tr.sectionRowIndex].selected;
        render();
    }
})