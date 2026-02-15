let x = 5;
const y = 6;
console.log(typeof(x));
x = "b";
console.log(typeof(x));

console.log("42" == 42); // true
console.log("42" === 42); // false, tipus egyezést néz először!
console.log("5" + 1); // "51" - string összefűzés! (ha + bármely oldala string)

let t = [-3, 5, 6, 10, 0, 2, -1];
t[20] = 2;

// 1. új tömbbe válogasd ki a páros számokat
let paros = [];
for (let i = 0; i < t.length; i++){
    if (t[i] % 2 === 0){
        // paros[paros.length] = t[i];
        paros.push(t[i]);
    }
}
console.log(paros);

let paros2 = [];
for (const el of t){
    if (el % 2 === 0) paros2.push(el);
}
console.log(paros2);

const paros3 = t.filter(x => x % 2 === 0);
console.log(paros3);

// let t = [-3, 5, 6, 10, 0, 2, -1];

// 2. minden elem köbét tartalmazó tömb

console.log(t.map(x => x ** 3));

// 3. találd meg az első páros elem értékét

console.log(t.find(x => x % 2 === 0));

// 4. mennyi a tömb elemeinek összege?
console.log(t.reduce((sum, x) => sum + x, 0));

// 5. mennyi a tömb nullától különböző elemeinek szorzata?
console.log(t.filter(x => x !== 0).reduce((prod, x) => prod * x, 1));

// 6. számold meg a negativ elemek számát!
console.log(t.filter(x => x < 0).length);
console.log(t.reduce((count, x) => x < 0 ? count + 1 : count, 0));

// 7. melyik a legnagyobb elem?
console.log(t.reduce( (max, x) => x > max ? x : max, -Infinity));
console.log(Math.max(...t));

const car = {
    model: "Tesla Model 3",
    year: 2018,
    broken: false
};
car.year = 2025;
car.color = "blue";
delete car.broken;
console.log(car);