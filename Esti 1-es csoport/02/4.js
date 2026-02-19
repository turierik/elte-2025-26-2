const rSlider = document.querySelector("#r");
const gSlider = document.querySelector("#g");
const bSlider = document.querySelector("#b");

function updateBackgroundColor(){
    const r = Number(rSlider.value);
    const g = Number(gSlider.value);
    const b = Number(bSlider.value);
    document.body.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
}

rSlider.addEventListener("input", updateBackgroundColor);
gSlider.addEventListener("input", updateBackgroundColor);
bSlider.addEventListener("input", updateBackgroundColor);
