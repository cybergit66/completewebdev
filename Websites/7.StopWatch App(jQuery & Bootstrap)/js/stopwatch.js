$(function(){
  
    //App mode
    var mode = 0;
    //time counter
    var timeCounter = 0;
    //lap counter
    var lapCounter = 0;
    //variable for setInterval
    var action;
    //Number of laps
    var lapNumber = 0;
    //minutes, seconds, centiseconds for time and lap
    var timeMinutes, timeSeconds, timeCentiseconds, lapMinutes, lapSeconds, lapCentiseconds;
    
    //On app load show start and lap buttons; hide all other buttons
    hideshowButtons("#startButton","#lapButton");
    
    //click on startButton
    $("#startButton").click(function(){
        //mode on
        mode = 1;
        //show stop and lap buttons
        hideshowButtons("#stopButton","#lapButton");
        //start counter
        startAction();
    });
        
    
    //click on stopButton
    $("#stopButton").click(function(){
        //show resume and reset buttons
        hideshowButtons("#resumeButton","#resetButton");
        //stop counter
        clearInterval(action);
    });
        
    
    //click on resumeButton
    $("#resumeButton").click(function(){
        //show stop and lap buttons
        hideshowButtons("#stopButton","#lapButton");
        //start action
        startAction();
    });
        
        
    
    //click on resetButton
    $("#resetButton").click(function(){
        //reload the page
        location.reload();
    });
    
    //click on lapButton
    $("#lapButton").click(function(){
        //if mode is ON
        if(mode){
            //stop action
            clearInterval(action);
            //resetLap and print lap details
            lapCounter = 0;
            addLap();
            //start action
            startAction();
        }
    });
        
    //functions
    
    //hideshowButtons show two buttons
    function hideshowButtons(x,y){
        $(".control").hide();
        $(x).show();
        $(y).show();
    }
    
    //start the counter
    function startAction(){
        action = setInterval(function(){
            timeCounter++;
            if(timeCounter == 60000){
                timeCounter = 0;
            }
            lapCounter++;
            if(lapCounter == 60000){
                lapCounter = 0;
            }
            updateTime();
        },10);
    }
    
    //updateTime function converts counters to min, sec, centiseconds
    function updateTime(){
        //1min = 60*100centiseconds
        timeMinutes = Math.floor(timeCounter/6000);
        //1sec = 100centiseconds
        timeSeconds = Math.floor((timeCounter%6000)/100);
        timeCentiseconds = (timeCounter%6000)%100;
        $("#timeMinute").text(format(timeMinutes));
        $("#timeSecond").text(format(timeSeconds));
        $("#timeCentisecond").text(format(timeCentiseconds));
        
        //1min = 60*100centiseconds
        lapMinutes = Math.floor(lapCounter/6000);
        //1sec = 100centiseconds
        lapSeconds = Math.floor((lapCounter%6000)/100);
        lapCentiseconds = (lapCounter%6000)%100;
        $("#lapMinute").text(format(lapMinutes));
        $("#lapSecond").text(format(lapSeconds));
        $("#lapCentisecond").text(format(lapCentiseconds));
    }
    
    //format numbers
    function format(number){
        if(number < 10){
            return '0' + number;
        } else {
            return number;
        }
    }
    
    //addLap function: print lap details inside the lap box
    function addLap(){
        lapNumber++;
        var myLapDetails = 
            '<div class="lap">' + 
            '<div class="lap-time-title">' + 'Lap ' + lapNumber + '</div>' + 
            '<div class="lap-time">' + 
                '<span>' + format(lapMinutes) + ':</span>' +
                '<span>' + format(lapSeconds) + ':</span>' +
                '<span>' + format(lapCentiseconds) + '</span>' +
            '</div>' + 
            '</div>';
        
        $(myLapDetails).prependTo("#laps");
    }
    
});