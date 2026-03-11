const taskA = document.querySelector('#taskA')
const taskB = document.querySelector('#taskB')
const taskC = document.querySelector('#taskC')
const taskD = document.querySelector('#taskD')
const taskE = document.querySelector('#taskE')

taskA.innerText = data.find(video => video.year < 2000).title;
taskB.innerText = data.filter(video => video.views > 100).map(video => video.title).join(', ');
taskC.innerText = data.filter(video => video.title.includes("Love")).length;

const sumOfViews2024 = data.filter(video => video.year === 2024).reduce((sum, video) => sum + video.views, 0);
const countOfVideos2024 = data.filter(video => video.year === 2024).length;
const avgViews = sumOfViews2024 / countOfVideos2024;

taskD.innerText = avgViews.toFixed(2);

const allTitles = data.map(video => video.title.slice(2 + video.title.indexOf('-'))).join('');
taskE.innerText = allTitles.split('').some(char => char >= '0' && char <= '9') ? "Yes" : "No";