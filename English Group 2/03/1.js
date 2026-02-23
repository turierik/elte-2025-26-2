const ul = document.querySelector('ul')

const animals = [
    "aligator", "bear", "cat", "dog", "elephant", 
    "frog", "giraffe", "horse", "iguana", "jaguar",
    "kangaroo", "lion", "monkey", "narwhal", "owl",
    "parrot", "quail", "rabbit", "snake", "tiger",
    "unicorn", "viper", "wombat", "xolo", "yak", "zebra"
];

// for (const animal of animals){
//     const li = document.createElement('li');
//     li.innerText = animal;
//     ul.appendChild(li);
// }

ul.innerHTML = animals.map(animal => `<li>${animal}</li>`).join('');

// function handleLiClick(e){
//     if (e.target.matches('li'))
//         e.target.style.color = "green";
// }

// ul.addEventListener("click", handleLiClick);

function delegate(parent, type, selector, handler) {
  parent.addEventListener(type, function (event) {
    const targetElement = event.target.closest(selector);

    if (this.contains(targetElement)) {
      handler.call(targetElement, event);
    }
  });
}

delegate(ul, "click", "li", function(){
    this.style.color = "blue";
})