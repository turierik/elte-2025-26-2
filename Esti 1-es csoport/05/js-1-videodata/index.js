const taskA = document.querySelector('#taskA')
const taskB = document.querySelector('#taskB')
const taskC = document.querySelector('#taskC')
const taskD = document.querySelector('#taskD')
const taskE = document.querySelector('#taskE')

taskA.innerText = data.find(video => video.year < 2000).title;
taskB.innerText = data.filter(video => video.views > 100)
    .map(video => video.title).join(', ');
taskC.innerText = data.filter(video => video.title.includes("Love")).length;

const videosFrom2024 = data.filter(video => video.year === 2024);

let sum = 0;
for (const video of videosFrom2024)
    sum += video.views;
// sum = videosFrom2024.reduce((s, video) => s + video.views, 0);
sum /= videosFrom2024.length;

taskD.innerText = sum.toFixed(2);

taskE.innerText = data.map(video => video.title.split('-')[1]).join('').split('').some(char => char >= "0" && char <= "9") ? "Igen" : "Nem";