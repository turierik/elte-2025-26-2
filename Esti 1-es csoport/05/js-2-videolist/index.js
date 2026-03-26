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
    const selectedVideos = data.filter(video => video.selected);
    if (selectedVideos.length === 0)
        sumSpan.innerText = data.reduce((sum, video) => sum + video.views, 0);
    else
        sumSpan.innerText = selectedVideos.reduce((sum, video) => sum + video.views, 0);
}

render();

videoTableBody.addEventListener("click", function(e){
    if (e.target.matches("td")){
        const tr = e.target.parentElement;
        data[tr.sectionRowIndex].selected = !data[tr.sectionRowIndex].selected;
        render();
    }
});

btnAdd.addEventListener("click", function(){
    const amount = Number(viewInput.value);
    data.filter(video => video.selected).forEach(video => video.views += amount);
    render();
});

btnSub.addEventListener("click", function(){
    const amount = Number(viewInput.value);
    data.filter(video => video.selected).forEach(video => video.views = Math.max(video.views - amount, 0));
    render();
});

videoTable.addEventListener("click", function(e){
    if (e.target.matches("th")){
        const key = e.target.dataset.sort;
        data.sort((a, b) => {
            if (a[key] > b[key]) return -1;
            if (a[key] == b[key]) return 0;
            return 1;
        });
        render();
    }
});