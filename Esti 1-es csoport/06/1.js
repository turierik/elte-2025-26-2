const canvas = document.querySelector("canvas");
const ctx = canvas.getContext('2d');

// közvetlenül a canvasre rajzol

ctx.fillStyle = "green";
ctx.fillRect(50, 70, 40, 20);
ctx.strokeStyle = "purple";
ctx.lineWidth = 2;
ctx.strokeRect(40, 60, 40, 20);

ctx.font = "40px Arial";
ctx.fillText("Hello", 100, 100);
ctx.strokeText("Hello", 100, 150);

const fox = new Image();
fox.src = "fox.jpg";
fox.addEventListener("load", () => ctx.drawImage(fox, 200, 200, 100, 100));

// útvonalakkal közvetetten

ctx.beginPath();
ctx.moveTo(200, 50);
ctx.lineTo(200, 100);
ctx.lineTo(150, 150);
ctx.lineTo(200, 50);
ctx.fill();
ctx.stroke();

ctx.beginPath();
ctx.arc(300, 100, 40, 0, 2 * Math.PI);
ctx.fill();
ctx.stroke();