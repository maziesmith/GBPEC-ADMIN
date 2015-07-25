$(document).ready(function(){
    var d = new Date;
    var hours = d.getHours(); // call methods on your instance d
    var mins = d.getMinutes();
    if (hours > 12) {
        var hour = (hours - 12);
        var ampm = "PM";
    }
    else {
        var hour = hours;
        var ampm = "AM";
    }
    var time = hour + ":" + mins + ampm;
    $("h1").html(time);
});​