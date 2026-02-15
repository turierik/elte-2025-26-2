let x = 5;
const y = 6;
x = 7;
console.log(x);
console.log(typeof(x));
x = "b";
console.log(typeof(x));
console.log("42" == 42); // THERE ARE TYPE CONVERSIONS!!!
console.log("42" === 42); // === checks the type first
console.log("5" + 1);
console.log("5" + "1");
console.log(5 + "1");
console.log(5 + 1);
console.log("504" - 1);

let t = [6, 8, -2, 3, 1, 0, 10, -7];

// 1.) only even numbers
let evens = [];
for (let i = 0; i < t.length; i++){
    if (t[i] % 2 === 0) evens.push(t[i]);
}
console.log(evens);

let evens2 = [];
for (const el of t){
    if (el % 2 === 0) evens2.push(el);
}
console.log(evens2);

let evens3 = t.filter(x => x % 2 === 0);
console.log(evens3);

// let t = [6, 8, -2, 3, 1, 0, 10, -7];

// 2.) create a new array that contains the
// square of all numbers in t
console.log(t.map(x => x*x));

// 3.) calculate the sum of the array t
console.log(t.reduce((acc, x) => acc + x, 0));

// 4.) find a negative number in t
console.log(t.find(x => x < 0));
// console.log(t.filter(x => x < 0)[0]);

// 5.) find the largest number in t
console.log(Math.max(...t));
console.log(t.reduce((acc, x) => x > acc ? x : acc, -Infinity));

// 6.) count the even numbers

console.log(t.filter(x => x % 2 === 0).length);
console.log(t.reduce((acc, x) => x % 2 === 0 ? acc + 1 : acc, 0));

const car = {
    model: "Tesla Model 3",
    year: 2023,
    broken: false
};
console.log(car.year);
console.log(car["year"]);
car.year = 2024;
console.log(car.year);
car.color = "red";
console.log(car);

const students = [
    {name: "Peter Parker", avg: 3.45, glasses: false},
    {name: "Harry Potter", avg: 4.34, glasses: true},
    {name: "John Wick", avg: 5.00, glasses: false},
    {name: "Eser Baris", avg: 5.00, glasses: true},
];

// students[0].name

// 1.) give me the name of a person with glasses
console.log(students.find(x => x.glasses).name);
console.log(students.filter(x => x.glasses).map(x => x.name));


// 2.) count the average of avgs
// hw :)
