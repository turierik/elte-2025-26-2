const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

const balls = [
    { x: 50, y: 50, r: 20, c: "red", v: 0 }
];

function render(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (const ball of balls){
        ctx.beginPath();
        ctx.fillStyle = ball.c;
        ctx.arc(ball.x, ball.y, ball.r, 0, 2 * Math.PI);
        ctx.fill();
    }
}

function update(dt){
    if (dt > 100) return;
    for (const ball of balls){
        ball.v += 0.0001 * dt;
        ball.y += ball.v * dt;
        if (ball.y + ball.r > canvas.height){
            ball.v *= -1;
            ball.y = canvas.height - ball.r;
        }
    }   
}

let last = performance.now();

function loop(){
    const now = performance.now();
    const dt = now - last;
    last = now;
    render();
    update(dt);
    requestAnimationFrame(loop);
}
loop();

canvas.addEventListener("click", function(e){
    balls.push({
        x: e.offsetX,
        y: e.offsetY,
        r: Math.floor(10 + Math.random() * 20),
        c: `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`,
        v: 0
    })
})