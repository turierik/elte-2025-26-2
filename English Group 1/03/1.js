const ul = document.querySelector("ul");

const fruits = ["apple", "banana", "coconut", "dragonfruit", "elderberry"];

// for (const fruit of fruits){
//     const li = document.createElement('li');
//     li.innerText = fruit;
//     ul.appendChild(li);
// }

ul.innerHTML = fruits.map(fruit => `<li>${fruit}</li>`).join('');

function handleLiClick(e){
    // console.log(e);
    if (e.target.matches('li'))
        e.target.style.color = "green";
}

ul.addEventListener("click", handleLiClick);