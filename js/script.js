/* Author: Mykel Nahorniak

*/

//// INIT
  var weightKg;
  var athleteName;

  var thisYear = Date.today().getYear().toString().slice(1);
  var thisMonth = Date.today().getMonth();
  var thisWeek = Date.today().getWeek();
  var thisDayRaw = Date.today().toString('ddd');
  var thisDay = thisDayRaw.toLowerCase();

//// UTILITY FUNCTIONS
function compareNum(a,b){
  return (a < b ? this >= a && this <= b : this >= b && this <= a);
}



jQuery(function($) {
//// CALENDAR
  // getting json data
  $.getJSON('data/workouts.js', function(data) {


//// CONFIGURATION
    $.each(data.config, function(i,item){
      // getting athlete weight in lbs and converting to kg
      weightKg    = item.weight/2.2;

      // getting athlete name
      athleteName = item.name;
    }); // end config each


//// SCHEDULES
    // get a list of all the historical schedules and append to list
    // FIXME: issue here is we need the item.[name].[day].workoutname to later reference in the activities each
    $.each(data.schedules, function(i,item){
      // getting raw workout name from schedules data
      var scheduleNameRaw        = item.name;

      // splitting out week number
      var scheduleName           = scheduleNameRaw.split('-')[0];

      // splitting out year number
      var scheduleYear           = scheduleNameRaw.split('-')[1];

      // splitting out workout shortname
      var scheduleType           = scheduleNameRaw.split('-')[2];


      //FIXME: debug hardcoded vars
      var tmpName = item.sun.workoutname;
      var parsedDuration = item.sun.duration;

      // if the data pulled is for this week, move forward
      if((scheduleName == thisWeek)) {

        // pull all of this week's activities in the json file
        $.each(data.activities, function(i,item){
          var activityName          = item.name;
          var activityShortName     = item.shortname
          var activityType          = item.type;
          var activityWarmup        = item.wu;
          var activityDesc          = item.desc;
          var activityInfo          = item.info;
          var activityCooldown      = item.cd;

          // if the pulled shortname matches the shortname of the schedule
          if((activityShortName == tmpName)) {
            // setting this activity to blank
            var thisActivity = "";

            // setting values for data if there isn't any
            if(activityWarmup == ""){
              activityWarmup = "None."
            }

            if(activityCooldown == ""){
              activityCooldown = "None."
            }

            if(activityInfo == ""){
              activityInfo = "None."
            }

            // defining the template to list the activity
            var activityTemplate = "<div class='activity'><h2>" + activityName + " / " + parsedDuration + " ('" + scheduleYear + " season)</h2><h6>Warm Up</h6><p>" + activityWarmup + "</p><h6>Workout</h6><p>" + activityDesc + "</p><h6 class='activity_info'>Coach Comments</h6><p>" + activityInfo + "</p><h6>Cool Down</h6><p>" + activityCooldown + "</p></div>";

            $('#workout').append(activityTemplate);
          }
        }); // end activities each
      }

      // defining the color-coded of workouts being done on a particular week
      // l/e week 10
      if (scheduleName <= 10 ) {
        rowClass = "sharpen";
      } else
      // g/e 11, l/e 24
      if ((scheduleName >= 11) && (scheduleName <= 24)) {
        rowClass = "racing";
      // g/e 25, l/e 27
      } else
      if ((scheduleName >= 25) && (scheduleName <= 27)) {
        rowClass = "peak";
      // g/e 28, l/e 35
      } else
      if ((scheduleName >= 28) && (scheduleName <= 35)) {
        rowClass = "racing"
      // g/e 36, l/e 39
      } else
      if ((scheduleName >= 36) && (scheduleName <= 39)) {
        rowClass = "offseason"
      // g/e 40, l/e 53
      } else
      if ((scheduleName >= 40) && (scheduleName <= 53)) {
        rowClass = "base"
      // if doesn't fit, say off season
      } else {
        rowClass = "offseason";
      }

      // defining the template to list the schedule
      // var scheduleTemplate = "<tr class='"+ rowClass + "' id='" + scheduleNameRaw + "'><td>" + scheduleType + "</td><td>" + scheduleName + "</td><td>" + scheduleYear + "</td><td id='" + scheduleName + "_mon'>" + scheduleMon + "</td><td id='" + scheduleName + "_tue'>" + scheduleTue + "</td><td id='" + scheduleName + "_wed'>" + scheduleWed + "</td><td id='" + scheduleName + "_thu'>" + scheduleThu + "</td><td id='" + scheduleName + "_fri'>" + scheduleFri + "</td><td id='" + scheduleName + "_sat'>" + scheduleSat + "</td><td id='" + scheduleName + "_sun'>" + scheduleSun + "</td></tr>";

      var scheduleTemplate = "<tr class='"+ rowClass + "' id='" + scheduleNameRaw + "'><td>" + scheduleType + "</td><td>" + scheduleName + "</td><td>" + scheduleYear + "</td></tr>";

      // pushing the template to the schedules schedule
      $('#schedules').append(scheduleTemplate);
    })

    // NOTE: it's important to keep this here, as it executes after the data is retrieved and rendered
    // unhiding data that is this ONLY season/week
    ($('#workout .activity:last, #schedules tr[id^=' + thisWeek + ']').show()

    ); // end schedules each


////FITNESS
    $.each(data.fitness[0], function(i,item){

      var fitnessTime  = i;
      var fitnessPower = item;
      var wKg = item/weightKg;

      var fitnessTemplate = "<tr id='" + i + "'><td>" + i + "</td><td>" + item + "</td><td class='wkg'>" + wKg + "</td></tr>";

      $('#profile').append(fitnessTemplate);

      // determine class for each power zone and color
      // grab data from first table
      var do_these = ["5s", "1m", "5m", "20m" ];
      var do_info = { };

      for( i = 0; i < do_these.length; i++ ) ( function(r) {
        do_info[r] = parseFloat($("#profile tr#" + r + " td:eq(2)").html());
      }) (do_these[i]);

      // apply colors to second table
      for( i = 0; i < do_these.length; i++ ) ( function(r,i) {
        $("#powerclass tr td:nth-child(" + (2+i) + ")").each( function() {
          var cell = parseFloat( $(this).html() );
          if( do_info[r] >= cell ) {
            $(this).css( { 'background-color': '#ACE2A7' } );
          }
        });
      }) (do_these[i], i);
    });


  }); // end get json call

/////GENERATING FUTURE
/*
var myObject = new Object();
myObject.name = "John";
myObject.age = 12;
myObject.pets = ["cat", "dog"];
Afterwards stringify it via:

var myString = JSON.stringify(myObject);
*/


////RENDERING
  // plopping in athlete name near bottom
  $('#fitness h1 small b').append(athleteName);

  // updating "today's workout" header to show this week
  $('#week_num').html('WEEK ' + thisWeek);

  // making today bold
  $("[id*="+thisDay+"]").css('font-weight', 'bold');

  // showing all workouts historically associated with this week
  $("#thisyearonly").click(function() {
    $('#workout .activity:last').css('background', '#ACE2A7');
    $('#workout .activity').not(':last').toggle(200);
    return false;
  });

  // showing all schedules
  $("#thisweekonly").click(function() {
    $('#schedules tr').not('[id^=' + thisWeek + ']').toggle();
    return false;
  });

  // rendering page-wide tooltips
  $('a[rel=tooltip]').tooltip();


}); // end jquery function
