const fruits = [
    "ananász", "banán", "citrom", "datolya", "eper", "füge",
    "gesztenye", "hibiszkusz", "inga", "jalapeno", "körte",
    "lime", "mangó", "narancs", "oliva", "papaya", "répa",
    "sárkánygyümölcs", "torma", "uborka", "vöröshagyma", "zeller"
];

const ul = document.querySelector("ul");

// for (const fruit of fruits){
//     const li = document.createElement("li");
//     li.innerText = fruit;
//     ul.appendChild(li);
// }

ul.innerHTML = fruits.map(fruit => `<li>${fruit}</li>`).join('');

function handleLiClick(e){
    if (e.target.matches("li"))
        e.target.style.color = "blue";
}

ul.addEventListener("click", handleLiClick);

function delegate(parent, type, selector, handler) {
  parent.addEventListener(type, function (event) {
    const targetElement = event.target.closest(selector);

    if (this.contains(targetElement)) {
      handler.call(targetElement, event);
    }
  });
}

delegate(ul, "mouseover", "li", function(){
    this.style.backgroundColor = "yellow";
})