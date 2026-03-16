const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

/*
TASK: create an animation of a falling ball/circle
let ball = {x: 50, y: 50, color: "red", r: 10};

1.) draw the ball :)
2.) make the ball fall at constant speed
3.) add gravity, make the ball increase its speed downwards
 - add another propetry, e.g. ball.v - update it too :)
4.) when the ball reaches the bottom of the canvas,
 make it bounce back
5.) make it work for multiple balls - when I click the canvas,
 a new ball of random size and color spawns at the click's location
*/

let balls = [
    {x: 50, y: 50, v: 0, color: "red", r: 10}
];

function draw(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (const ball of balls){
        ctx.beginPath();
        ctx.arc(ball.x, ball.y, ball.r, 0, 2 * Math.PI);
        ctx.fillStyle = ball.color;
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
    draw();
    update(dt);
    last = now;
    requestAnimationFrame(loop);
}
loop();

canvas.addEventListener("click", function(e){
    balls.push({
        x: e.offsetX,
        y: e.offsetY,
        v: 0,
        r: Math.floor(10 + Math.random() * 10),
        color: `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`
    });
});