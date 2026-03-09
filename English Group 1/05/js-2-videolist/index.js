const videoTable = document.querySelector('#video-table')
const videoTableBody = document.querySelector('#video-table tbody')
const viewInput = document.querySelector('#amount')
const btnAdd = document.querySelector('#btn-add')
const btnSub = document.querySelector('#btn-sub')
const sumSpan = document.querySelector('#sum')

function renderTable(){
    videoTableBody.innerHTML = 
    data.map(video => `<tr class="${video.selected ? "selected" : ""}"><td>${video.year}</td><td>${video.title}</td>
        <td>${video.views} million</td></tr>`).join('');
}
renderTable();
updateSum();

delegate(videoTableBody, "click", "tr", function(){
    this.classList.toggle("selected");
    data[this.rowIndex - 1].selected = this.classList.contains("selected");
    updateSum();
});

function updateSum(){
    const selected = data.filter(video => video.selected);
    if (selected.length === 0)
        sumSpan.innerText = data.reduce((sum, video) => sum + video.views, 0);
    else
        sumSpan.innerText = selected.reduce((sum, video) => sum + video.views, 0);
}

function delegate(parent, type, selector, handler) {
  parent.addEventListener(type, function (event) {
    const targetElement = event.target.closest(selector);
    if (this.contains(targetElement)) {
      handler.call(targetElement, event);
    }
  });
}

btnAdd.addEventListener("click", function(){
    const selected = data.filter(video => video.selected);
    const amount = Number(viewInput.value);
    for (const video of selected){
        video.views += amount;
    }
    renderTable();
    updateSum();
});

btnSub.addEventListener("click", function(){
    const selected = data.filter(video => video.selected);
    const amount = Number(viewInput.value);
    for (const video of selected){
        video.views -= amount;
        if (video.views < 0) video.views = 0;
    }
    renderTable();
    updateSum();
});

videoTable.addEventListener("click", function(e){
    if (e.target.matches("th")){
        data.sort((a, b) => {
            if (b[e.target.dataset.sort] > a[e.target.dataset.sort]) return 1;
            return -1;
        });
        renderTable();
    }
});