const heading = document.querySelector("h1");
heading.innerText = "<i>Más</i> lettem"; // nem fog menni a formázás :(
heading.innerHTML = "<i>Más</i> lettem"; // így már igen

const par = document.querySelector("p");
// QS mindig az ELSŐ illeszkedő elemet találja meg
// ha nincs illeszkedő elem --> null
par.innerText = "Kiskutya";

const pars = document.querySelectorAll("p");
for (const par of pars)
    par.innerText = "Megváltoztam";

const second = document.querySelector("#second");
second.style.color = "green";
// CSS background-color -> JS backgroundColor
second.style.backgroundColor = "yellow";

const img = document.querySelector("img");
img.src = "B.png";