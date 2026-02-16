const heading = document.querySelector("h1");
heading.innerText = "I <i>have</i> changed"; // will not be italic!!! use innerHTML
heading.innerHTML = "I <i>have</i> changed"; // this will be formatted properly :)

const p = document.querySelector("p"); // if there are multiple matching elements, the first one will be found
// if not found: null
p.innerText = "Changed";

const ps = document.querySelectorAll("p"); // NodeList
// if not found: empty NodeList
for (const p of ps)
    p.innerText = "New text";

const img = document.querySelector("img");
img.src = "B.png";

const second = document.querySelector("#second");
second.style.color = "green";
// CSS: background-color  JS: backgroundColor
second.style.backgroundColor = "yellow";
