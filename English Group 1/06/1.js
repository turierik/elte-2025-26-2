const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

// these functions will draw directly to the canvas

ctx.fillStyle = "green";
ctx.fillRect(50, 100, 30, 40);
ctx.strokeStyle = "blue";
ctx.lineWidth = 8;
ctx.strokeRect(40, 80, 60, 60);

ctx.font = "40px Arial";
ctx.fillText("Hello", 200, 200);
ctx.lineWidth = 1;
ctx.strokeText("Hello", 300, 200);

const fox = new Image();
fox.src = "fox.jpg";
fox.addEventListener("load", () => ctx.drawImage(fox, 200, 200, 200, 200));

// more complicated - path in memory - then call fill() or stroke()

ctx.beginPath(); // need it, otherwise elements will be connected
ctx.moveTo(80, 80);
ctx.lineTo(80, 150);
ctx.lineTo(150, 150);
ctx.lineTo(80, 80);
ctx.fill();
ctx.stroke();

ctx.beginPath();
ctx.arc(200, 80, 30, 0, Math.PI); // circle
ctx.fill();

let x = 20; // square's x position

function draw(){
    ctx.clearRect(0, 0, canvas.width, 20);
    ctx.fillStyle = "red";
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

