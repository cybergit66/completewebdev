var check_play;
var score;
var myAnswer = 0;
var math_answer = 0;
var myCounter;
var correct;

// if click on start/reset button
document.getElementById("startReset").onclick = 
    function(){
        check_play = document.getElementById("startReset").innerHTML;
        // check to see if we are playing
        if(check_play == 'Reset Game'){
            // if so, reload page
        document.getElementById("startReset").innerHTML = "Start Game";
        location.reload();
        } else {
            // set score to zero
        score = 0;
        document.getElementById("scoreValue").innerHTML = score;
        
        // show countdown box
        document.getElementById("timeRemaining").style.display = "inline";
        
       // start reducing time by 1 sec every sec in loops
        startCountdown();
            
        // change button to reset
        document.getElementById("startReset").innerHTML = 'Reset Game';
        
        // generate a new question and multiple answers
        generateAnswers();
    }
}

function startCountdown(){
    // start reducing time by 1 sec every sec in loops
        var counter = document.getElementById("remainingValue");
        var x = 60;
        myCounter = setInterval(function(){
            x--;
            counter.innerHTML = x;
            // check to see if any time is left
            if(x == 0){
                // break game
                clearInterval(myCounter);
                myCounter = 0;
                document.getElementById("gameOver").style.display = "block";
                document.getElementById("gameOver").innerHTML = "<p>GAME OVER!</p><p>Your score is " + score + ".</p>";
                document.getElementById("timeRemaining").style.display = "none"
            }
        },1000);
}

function generateAnswers(){
        a = Math.floor(Math.random() * 13);
        b = Math.floor(Math.random() * 13);
        c = Math.floor(Math.random() * 16);
        document.getElementById("question").innerHTML = a + ' X ' + b;
        
        math_answer = a * b;
    
        var correct_position = 1 + Math.round(3*Math.random());
        
        document.getElementById("box" + correct_position).innerHTML = math_answer; // fill one box with the correct answer
        
        var answers = [math_answer];
        
        for(i=1; i<5; i++){
            if(i != correct_position){
                var wrong_answer1;
                
                do {wrong_answer1 = (1+Math.round(9*Math.random()))*(1+Math.round(9*Math.random()));
                    document.getElementById("box"+i).innerHTML = wrong_answer1;}
                while(wrong_answer1 == math_answer)
            }
        }
}

// if answer box clicked check 
document.getElementById("box1").onclick = function(){
    if(checkCounter()){
        myAnswer = document.getElementById("box1").innerHTML;
        checkAnswer(myAnswer);
    }
}

document.getElementById("box2").onclick = function(){
    if(checkCounter()){
        myAnswer = document.getElementById("box2").innerHTML;
        checkAnswer(myAnswer);
    }
}

document.getElementById("box3").onclick = function(){
    if(checkCounter()){
    myAnswer = document.getElementById("box3").innerHTML;
    checkAnswer(myAnswer);
    }
}

document.getElementById("box4").onclick = function(){
    if(checkCounter()){
        myAnswer = document.getElementById("box4").innerHTML;
        checkAnswer(myAnswer);
    }   
}

function checkAnswer(myAnswer){
    //if we are playing
        if(myAnswer == math_answer){
            score++;
            document.getElementById("scoreValue").innerHTML = score;
            document.getElementById("wrong").style.display = "none";
            document.getElementById("correct").style.display = "block";
            setTimeout(function(){document.getElementById("correct").style.display = "none"},1000);
            generateAnswers();
            
        } else {
            document.getElementById("correct").style.display = "none";
            document.getElementById("wrong").style.display = "block";
            setTimeout(function(){document.getElementById("wrong").style.display = "none"},1000);
        }
    }

   
function hideElement(id){
    document.getElementById(id).style.display = "none";
}
    
function checkCounter(){
    if(myCounter > 0){
        return true;
    } else {
        resetGame();
    }
    
}
    
function resetGame(){
    document.getElementById("startReset").innerHTML = "Start Game";
    location.reload();
}
        // correct?
            //yes
                //increase score by one
                //show the correct box for 1 sec
                // generate new Q&A
            // no
                // show try again box for 1 sec