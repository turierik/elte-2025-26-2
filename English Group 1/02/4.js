const rSlider = document.querySelector("#r");
const gSlider = document.querySelector("#g");
const bSlider = document.querySelector("#b");

function handleSliderInput(){
    const r = Number(rSlider.value);
    const g = Number(gSlider.value);
    const b = Number(bSlider.value);
    // document.body.style.backgroundColor = "rgb(" + r + ", " + g + ", " + b + ")";
    document.body.style.backgroundColor = `rgb(${r}, ${g}, ${b})`; // BACKTICK STRING! (eng keyboard: above TAB key)
}

rSlider.addEventListener("input", handleSliderInput);
gSlider.addEventListener("input", handleSliderInput);
bSlider.addEventListener("input", handleSliderInput);