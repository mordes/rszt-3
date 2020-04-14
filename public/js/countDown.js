var timeweneed;
var countDownDate

function setEndDate(time) {
    timeweneed = time;
    countDownDate = new Date(timeweneed).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = "Remaining time: <div style='font-size: 50px'>" + days + ":" + hours + ":"
            + minutes + ":" + seconds + "</div> <div style='font-size: 10px'>(Day/Hour/Minute/Second)</div>";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "Remaining time: <div style='font-size: 40px; color: darkred'>The auction is over!</div> <div style='font-size: 10px'>(Day/Hour/Minute/Second)</div>";
        }
    }, 1000);
}

function wait(ms){
    var start = new Date().getTime();
    var end = start;
    while(end < start + ms) {
        end = new Date().getTime();
    }
}
