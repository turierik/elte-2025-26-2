let x = 5;
console.log(x);
console.log(typeof(x));
x = "b";
console.log(typeof(x));
console.log("42" == 42); // type conversions happen ALL THE TIME
console.log("42" === 42); // === always compares the types first
console.log("5" + 1);
console.log(5 + "1");
console.log("5" + "1");
console.log(5 + 1);

let t = [-3, 2, 0, 10, -7, 9, 6];

// 1.) create a new array that contains the even numbers in t
let evens1 = [];
for (let i = 0; i < t.length; i++){
    if (t[i] % 2 === 0){
        // evens1[evens1.length] = t[i];
        evens1.push(t[i]);
    }
}
console.log(evens1);

let evens2 = [];
for (const el of t){
    if (el % 2 === 0){
        evens2.push(el);
    }
}
console.log(evens2);

let evens3 = t.filter(x => x % 2 === 0);
console.log(evens3);

// let t = [-3, 2, 0, 10, -7, 9, 6];

// 2.) create a new array that has the square of all numbers from t
console.log(t.map(x => x*x));
// 3.) find the first negative number in t
console.log(t.find(x => x < 0));
console.log(t.filter(x => x < 0)[0]);
// 4.) calculate the sum of t
console.log(t.reduce((acc, x) => acc + x, 0));
// 5.) count the number of even numbers in t
console.log(t.reduce((acc, x) => x % 2 === 0 ? acc + 1 : acc, 0 ));
console.log(t.filter(x => x % 2 === 0).length);
// 6.) find the largest number in t
console.log(t.reduce((acc, x) => x > acc ? x : acc, -Infinity));
console.log(Math.max(...t));

const car = {
    model: "Tesla Model 3",
    year: 2022,
    broken: false
};

console.log(car.year);
console.log(car["year"]);
car.year = 2025;
car.color = "blue";
delete car.broken;
console.log(car);
// car = { model: "Not Tesla" };

const students = [
    {name: "Harry Potter", avg: 4.56, glasses: true},
    {name: "Peter Parker", avg: 5.00, glasses: true},
    {name: "John Doe", avg: 3.33, glasses: false}
];

// 1.) list the names of students with glasses
// 1 student: students.find(s => s.glasses).name
console.log(students.filter(s => s.glasses).map(s => s.name));

// 2.) calculate the avg of all students
// hw :)