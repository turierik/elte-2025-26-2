const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

// drawing directly to the canvas

ctx.fillStyle = "red";
ctx.fillRect(40, 60, 30, 50);
ctx.strokeStyle = "blue";
ctx.lineWidth = 4;
ctx.strokeRect(30, 50, 30, 50);

ctx.font = "40px Arial";
ctx.lineWidth = 1;
ctx.fillText("Hello", 150, 100);
ctx.strokeText("Hello", 150, 200);

const fox = new Image();
fox.src = "fox.jpg";

fox.addEventListener("load", () => {
    ctx.drawImage(fox, 180, 180, 100, 100);
});

// in memory path first - call fill() or stroke() after

ctx.beginPath(); // need to start fresh
ctx.moveTo(80, 80);
ctx.lineTo(80, 200);
ctx.lineTo(150, 180);
ctx.lineTo(80, 80);
ctx.fill();

ctx.beginPath();
ctx.arc(230, 50, 20, 0, Math.PI * 2);
ctx.fill();
ctx.stroke();

// animation

let x = 20;

function draw(){
    ctx.clearRect(0, 0, canvas.width, 20);
    ctx.fillStyle = "green";
    ctx.fillRect(x, 0, 20, 20);
}

function update(dt){
    x += 0.1 * dt;
}

let last = performance.now();

function loop(){
    const now = performance.now();
    const dt = now - last;
    draw();
    update(dt);
    last = now;
    requestAnimationFrame(loop);
}
loop();
