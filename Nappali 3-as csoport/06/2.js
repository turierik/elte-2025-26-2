const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

/* TASK: pattogó labdák
1. rajzolj egy színes labdát (kört)
let ball = {x: 50, y: 50, r: 20, c: "red"}
2. a labda essen le állandó sebességgel
3. a labda gyorsulva essen le
 - pl. ball.v - ezt is meg kell növelni
4. ha a labda eléri a canvas alsó határát, akkor
 pattanjon vissza
5. működjön több labdára is :)
let balls = [];
6. ha a canvasre kattintok, generálódjon egy új labda
 a kattintás helyén, random színnel és mérettel */


let balls = [
    {x: 50, y: 50, r: 20, v: 0, c: "red"}
];

function render(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (const ball of balls){
        ctx.fillStyle = ball.c;
        ctx.beginPath();
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
    render();
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
        c: `rgb(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255})`
    });
});