var playing = false;
var score;
var trials_left;
var fruits = ['apple','cherry','grapes','mango','orange','peach','pear','pineapple', 'watermelon'];
var step;
var action; // used for drop down

$(function(){
    
    // click on start/reset button
    
    $("#startReset").click(function(){
        
        // check to see if we are playing
        if(playing == true){
            
            // reload page
            location.reload();
            
        }else {
            
            // no?
            playing = true; // game initiated
            
            //set score to 0
            score = 0;
            $("#scoreValue").html(score);
            
            // Display the trialsLeft box
            $("#trialsLeft").show();
            trials_left = 3;
            addHearts();
            
            // hide game over box
            $("#gameOver").hide();
            
            //change button text to reset game
            $("#startReset").html("Reset Game");
            
            // start dropping fruits
            dropFruits();
        }
    });
    
// slice a fruit
$("#fruit1").mouseover(function(){
    // update score
    score++;
    $("#scoreValue").html(score);
    
    // play sound
//    document.getElementById("kungFu").play();
    $("#kungFu")[0].play();
    
    // stop fruit
    clearInterval(action);
    
    // explode fruit
    $("#fruit1").hide("explode", 500);
    
    // send new fruit
    setTimeout(dropFruits, 500);
});

// functions 

function addHearts(){
    $("#trialsLeft").empty();
    for(i = 0; i < trials_left; i++){
                $("#trialsLeft").append('<img src="img/heart.png" class="life">');
    }
}

// start dropping fruits function
function dropFruits(){
    
    // generate fruit
    $("#fruit1").show();
    
    chooseFruit(); //choose a random fruit to drop
    $("#fruit1").css({'left' : Math.round(700*Math.random()), 'top': -50}); // gives the fruit a random start position
    
    // generate a random drop
    step = 1+ Math.round(5*Math.random());
    
    // move fruit down by one step every 10ms
    action = setInterval(function(){
        
        // start dropping fruit by one step
        $("#fruit1").css('top', $("#fruit1").position().top + step);
        
        //check if the fruit is too low
        if($("#fruit1").position().top > $("#fruitsContainer").height()){
            
            // if any trials are left
            if(trials_left > 1){
                
                // generate fruit
                $("#fruit1").show();
                
                // choose a random fruit to drop
                chooseFruit();
                
                // give the fruit a random start position
                $("#fruit1").css({'left' : Math.round(700*Math.random()), 'top': -50});
                
                // generate a random drop
                step = 1+ Math.round(5*Math.random());
                
                //reduce trials by one
                trials_left --;
                
                // populate trials left box
                addHearts();
            } else {
                //game over
                playing = false;
                // change button text
                $("#startReset").html("Start Game");
                $("#gameOver").show();
                $("#gameOver").html('<p>Game Over!</p><p>Your score is ' + score + '</p>');
                $("#trialsLeft").hide();
                stopAction();
            }
        }
    }, 10);
}

// generate a random fruit to drop
function chooseFruit(){
    $("#fruit1").attr('src', 'img/' + fruits[Math.round(8*Math.random())] +'.png'); 
}

// stop dropping fruit
function stopAction(){
    clearInterval(action);
    $("#fruit1").hide();
}
    
});