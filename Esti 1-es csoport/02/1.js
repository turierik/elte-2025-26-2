const heading = document.querySelector('h1');
heading.innerText = "Az <i>új</i> szöveg"; // nem lesz dőlt a szöveg
heading.innerHTML = "Az <i>új</i> szöveg"; // itt már működik a formázás

const par = document.querySelector('p');
// ha több illeszkedő elem van --> ELSŐT találja meg
// ha nincs illeszkedő elem --> null
par.innerText = "Megváltozott";

const pars = document.querySelectorAll('p'); // NodeList
// ha nincs illeszkedő elem --> üres NodeList
for (const par of pars)
    par.innerText = "Mind megváltozott";

const second = document.querySelector('#second');
second.style.color = "green";
// CSS: background-color -> JS: backgroundColor
second.style.backgroundColor = "yellow";

const image = document.querySelector('img');
image.src = "B.png";