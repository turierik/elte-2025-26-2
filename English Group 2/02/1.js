const heading = document.querySelector("h1");
heading.innerText = "I <i>have</i> changed"; // this will not format properly
heading.innerHTML = "I <i>have</i> changed"; // this will parse the HTML tags and format properly :) yay! :)

const p = document.querySelector("p");
// if there are multiple matching elements, QS will always find the first one
// if there is no match: null
p.innerText = "Changed";

const ps = document.querySelectorAll("p"); // NodeList
// if there is no match: empty NodeList
for (const p of ps)
    p.innerText = "New text";

const second = document.querySelector("#second");
// CSS tag selector: h1, p... ID: #id, Class: .class
second.style.color = "green";
// CSS: background-color, JS: backgroundColor
second.style.backgroundColor = "rgba(255, 239, 94, 1)";

const img = document.querySelector("img");
img.src = "B.png";