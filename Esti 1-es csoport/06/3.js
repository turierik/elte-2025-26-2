const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

let hands = [];

function render(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.strokeStyle = "blue";
    ctx.lineWidth = 10;
    ctx.beginPath();
    ctx.arc(200, 200, 180, 0, 2 * Math.PI);
    ctx.stroke();
    for (const hand of hands){
        ctx.strokeStyle = "black";
        ctx.lineWidth = hand.width;
        ctx.beginPath();
        ctx.moveTo(200, 200);
        ctx.lineTo(200 + Math.sin(hand.angle) * hand.length, 200 - Math.cos(hand.angle) * hand.length)
        ctx.stroke();
    }
}

function update(){
    const now = new Date();
    const h = now.getHours();
    const m = now.getMinutes();
    const s = now.getSeconds();
    const z = now.getMilliseconds();

    const hAngle = 2 * Math.PI / 12 * h + (2 * Math.PI / 12 / 60 * m);
    const mAngle = 2 * Math.PI / 60 * m + (2 * Math.PI / 60 / 60 * s);
    const sAngle = 2 * Math.PI / 60 * s + (2 * Math.PI / 60 / 1000 * z);

    hands = [
        { width: 8, length: 110, angle: hAngle },
        { width: 4, length: 140, angle: mAngle },
        { width: 2, length: 170, angle: sAngle },
    ];
}

function loop(){
    render();
    update();
    requestAnimationFrame(loop);
}
loop();