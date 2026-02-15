let x = 5;
console.log(typeof(x));
x = 'b';
console.log(typeof(x));

console.log("42" == 42); //true
console.log("42" === 42);

console.log("5" + 1);
console.log(5 + "1");
console.log("5" + "1");
console.log(5 + 1);

let t = [-3, 5, 6, 0, 10, 7, -4];

// 1. válogasd ki a páros számokat

let par = [];
for (let i = 0; i < t.length; i++){
    if (t[i] % 2 === 0){
        //par[par.length] = t[i];
        par.push(t[i]);
    }
}
console.log(par);

let par2 = [];
for (const el of t){
    if (el % 2 === 0) par2.push(el);
}
console.log(par2);

console.log(t.filter(x => x % 2 === 0));

// let t = [-3, 5, 6, 0, 10, 7, -4];
// 2. emeld négyzetre a tömb minden elemét
console.log(t.map(x => x*x));

// 3. találd meg az első páros elemet
console.log(t.find(x => x % 2 === 0));

// 4. találd meg az első páros elem indexét
console.log(t.findIndex(x => x % 2 === 0));

// 5. add össze az elemeket!
console.log(t.reduce( (sum, x) => sum + x, 0 ));

// 6. hány negativ elem van?
console.log(t.filter(x => x < 0).length);
console.log(t.reduce((count, x) => x < 0 ? count + 1 : count, 0));

// 7. mennyi a legnagyobb elem értéke?
console.log(t.reduce((max, x) => x > max ? x : max, -Infinity));
console.log(Math.max(...t));

// 8. rendezd növekvő sorrendbe!
t.sort(); // HAHAHAHA, stringként rendez!
console.log(t.sort((a, b) => a - b));

const car = {
    model: "Tesla Model 3",
    year: 2023,
    broken: false
};

console.log(car.year);
console.log(car["year"]);

car.year = 2024;
car.color = "blue";
delete car.broken;
console.log(car);

const students = [
    { name: "Harry Potter", avg: 4.35, glasses: true },
    { name: "Peter Parker", avg: 5.00, glasses: true },
    { name: "Hulk", avg: 3.33, glasses: false }
];

// 1. add meg egy szemüveges ember nevét
console.log(students.find(s => s.glasses).name);

// 2. add meg az összes szemüveges ember nevét
console.log(students.filter(s => s.glasses).map(s => s.name));

