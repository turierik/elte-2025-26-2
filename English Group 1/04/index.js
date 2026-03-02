const wordList = ["javascript", "programming"];
const visualElements = [
    `<line x1="0" y1="99%" x2="100%" y2="99%" />`,
    `<line x1="20%" y1="99%" x2="20%" y2="5%" />`,
    `<line x1="20%" y1="5%" x2="60%" y2="5%" />`,
    `<line x1="60%" y1="5%" x2="60%" y2="20%" />`,
    `<circle cx="60%" cy="30%" r="10%" />`,
    `<line x1="60%" y1="30%" x2="60%" y2="70%" />`,
    `<line x1="40%" y1="50%" x2="80%" y2="50%" />`,
    `<line x1="60%" y1="70%" x2="50%" y2="90%" />`,
    `<line x1="60%" y1="70%" x2="70%" y2="90%" />`
];

let targetWord;
let guessedLetters;
let gameOver;

function startGame(){
    targetWord = wordList[Math.floor(Math.random() * wordList.length)];
    guessedLetters = [];
    gameOver = false;
    document.querySelector("#controls").style.display = "none";
    document.querySelector("#game").style.display = "block";
    renderState();
}

function renderState(){
    renderWord();
    renderButtons();
    renderLittleMan();
    checkEndGame();
}

function renderWord(){
    document.querySelector("tr").innerHTML = 
        targetWord.split('').map(char => `<td>${
            guessedLetters.includes(char) ? char : '_'
        }</td>`).join('');
}

function renderButtons(){
    const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split('');
    document.querySelector('#buttons').innerHTML = 
        alphabet.map(letter => `<button id="${letter}" ${
            guessedLetters.includes(letter.toLowerCase()) ? "disabled" : ""
        }>${letter}</button>`).join('');
}

function renderLittleMan(){
    document.querySelector('svg').innerHTML = visualElements.slice(0, mistakes()).join('');
}

function handleButtonClick(e){
    if (!gameOver && e.target.matches('button')){
        guessedLetters.push(e.target.innerText.toLowerCase());
        renderState();
    }
}

document.body.addEventListener("keypress", function(e){
    const button = document.querySelector(`button#${e.key.toUpperCase()}`);
    button.dispatchEvent(new Event("click", { bubbles: true }));
});

const mistakes = () => guessedLetters.filter(letter => !targetWord.includes(letter)).length;

function checkEndGame(){
    if (mistakes() >= visualElements.length){
        // dead
        document.querySelector("#result").innerText = `You died. The word was: ${targetWord}`;
        document.querySelector("#controls").style.display = "block";
        gameOver = true;
    } else if (targetWord.split('').every(letter => guessedLetters.includes(letter))){
        // guessed the word
        document.querySelector("#result").innerText = `Congratulations!`;
        document.querySelector("#controls").style.display = "block";
        gameOver = true;
    }
}

document.querySelector("#start").addEventListener("click", startGame);
document.querySelector("#buttons").addEventListener("click", handleButtonClick);