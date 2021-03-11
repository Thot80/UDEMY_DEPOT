let form = document.querySelector('.form');
let userAnswer = [];
const answer = ['c', 'a', 'b', 'c', 'c'];
let note = null;
let q1 = document.getElementsByName('q1');
let q2 = document.getElementsByName('q2');
let q3 = document.getElementsByName('q3');
let q4 = document.getElementsByName('q4');
let q5 = document.getElementsByName('q5');
let affichageNote = document.querySelector('.note');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    userAnswer = [];
    note = 0;
    form.classList.remove("echec");
    for(let a1 of q1)
    {
        if(a1.checked)
        {
            userAnswer.push(a1.value);
        }
    }
    for(let a2 of q2)
    {
        if(a2.checked)
        {
            userAnswer.push(a2.value);
        }
    }
    for(let a3 of q3)
    {
        if(a3.checked)
        {
            userAnswer.push(a3.value);
        }
    }
    for(let a4 of q4)
    {
        if(a4.checked)
        {
            userAnswer.push(a4.value);
        }
    }
    for(let a5 of q5)
    {
        if(a5.checked)
        {
            userAnswer.push(a5.value);
        }
    }
    for(let i=0; i < userAnswer.length; i++)
    {
        if(userAnswer[i] === answer[i])
        {
            note++;
        }
    }
    affichageNote.innerText = note + '/5';
    if(note != 5)
    {
        form.classList.add("echec");
    }
})