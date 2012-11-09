/* Author: Mykel Nahorniak

*/

// utility functions
function compareNum(a,b){
    return (a < b ? this >= a && this <= b : this >= b && this <= a);
}


jQuery(function($) {

  // setting date information for reference
  var thisMonth = Date.today().getMonth();
  var thisWeek = Date.today().getWeek();
  var thisDayRaw = Date.today().toString('ddd');
  var thisDay = thisDayRaw.toLowerCase();

  // setting activity variable outside so it can be referenced
  var thisActivity = "";

  $('#week_num').html('WEEK ' + thisWeek);

  // getting json data
  $.getJSON('data/workouts.js', function(data) {

    // get a list of all the historical schedules and append to list
    $.each(data.schedules, function(i,item){
      var scheduleNameRaw        = item.name;
      var scheduleName           = scheduleNameRaw.split('-')[0];
      var scheduleYear           = scheduleNameRaw.split('-')[1];
      var scheduleType           = scheduleNameRaw.split('-')[2];

      var scheduleMon            = item.mon.workoutname;
      var durationMon            = item.mon.duration;

      var scheduleTue            = item.tue.workoutname;
      var durationTue            = item.tue.duration;

      var scheduleWed            = item.wed.workoutname;
      var durationWed            = item.wed.duration;

      var scheduleThu            = item.thu.workoutname;
      var durationThu            = item.thu.duration;

      var scheduleFri            = item.fri.workoutname;
      var durationFri            = item.fri.duration;

      var scheduleSat            = item.sat.workoutname;
      var durationSat            = item.sat.duration;

      var scheduleSun            = item.sun.workoutname;
      var durationSun            = item.sun.duration;

      // defining the type of workouts being done on a particular week
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
      var scheduleTemplate = "<tr class='"+ rowClass + "' id='" + scheduleNameRaw + "'><td>" + scheduleType + "</td><td>" + scheduleName + "</td><td>" + scheduleYear + "</td><td id='" + scheduleName + "_mon'>" + scheduleMon + "</td><td id='" + scheduleName + "_tue'>" + scheduleTue + "</td><td id='" + scheduleName + "_wed'>" + scheduleWed + "</td><td id='" + scheduleName + "_thu'>" + scheduleThu + "</td><td id='" + scheduleName + "_fri'>" + scheduleFri + "</td><td id='" + scheduleName + "_sat'>" + scheduleSat + "</td><td id='" + scheduleName + "_sun'>" + scheduleSun + "</td></tr>";

      // pushing the template to the schedules schedule
      $('#schedules').append(scheduleTemplate);



      // defining the activity to display for this week (in the next function)
      if (scheduleName == thisWeek) {
        if (thisDayRaw == 'Mon') {
          thisActivity += scheduleMon + "DUR" + durationMon + "AND";
        } else
        if (thisDayRaw == 'Tue') {
          thisActivity += scheduleTue + "DUR" + durationTue + "AND";
        } else
        if (thisDayRaw == 'Wed') {
          thisActivity += scheduleWed + "DUR" + durationWed + "AND";
        } else
        if (thisDayRaw == 'Thu') {
          thisActivity += scheduleThu + "DUR" + durationThu + "AND";
        } else
        if (thisDayRaw == 'Fri') {
          thisActivity += scheduleFri + "DUR" + durationFri + "AND";
        } else
        if (thisDayRaw == 'Sat') {
          thisActivity += scheduleSat + "DUR" + durationSat + "AND";
        } else
        if (thisDayRaw == 'Sun') {
          thisActivity += scheduleSun + "DUR" + durationSun + "AND";
        } else {
          thisActivity = 'No Data-0mAND';
        }
      }

    }); // end schedules each



    // pull the activities associated with this week's block and display them
    $.each(data.activities, function(i,item){
      var activityName          = item.name;
      var activityShortName     = item.shortname
      var activityType          = item.type;
      var activityWarmup        = item.wu;
      var activityDesc          = item.desc;
      var activityInfo          = item.info;
      var activityCooldown      = item.cd;

      // assigning placeholder values for clearer readability
      if(activityWarmup == ""){
        activityWarmup = "None."
      }

      if(activityCooldown == ""){
        activityCooldown = "None."
      }

      var thisActivitySplit = thisActivity.split('AND');

      $.each(thisActivitySplit,function(){

        var parsedActivity = this.split('DUR')[0];
        var parsedDuration = this.split('DUR')[1];

        if(parsedActivity == activityShortName){
          // defining the template to list the workout
          var activityTemplate = "<div class='activity'><h2>" + activityName + " / " + parsedDuration + "</h2><h6>Warm Up</h6><p>" + activityWarmup + "</p><h6>Workout</h6><p>" + activityDesc + "</p><h6 class='activity_info'>Coach Comments</h6><p>" + activityInfo + "</p><h6>Cool Down</h6><p>" + activityCooldown + "</p></div>";

          $('#workout').append(activityTemplate);
        }
      });


      // if there aren't any coach comments, hide the element for this specific activity
      if(activityInfo == ""){
        $('#' + activityShortName + ' h6.activity_info').hide();
      }

    }); // end activities each






  }); // end get json call


  // calculating power profile category
  $.each("#fitness table tr", function(){

  //FIXME: not calling proper thing

    var beep = $(this + 'td.wkg').html();

    console.log(beep);
  });



  $("#thisweekonly").click(function() {
    // re-showing data for this week
    $('#schedules tr').not('[id^=' + thisWeek + ']').toggle();
    return false;
  });

  $("#thisyearonly").click(function() {
    // showing only the latest workout
    $('#workout .activity').not(':last').toggle();
    return false;
  });


  // hiding data that isn't this season/week
  $('#workout .activity').not(':last').hide();
  $('#schedules tr').not('[id^=' + thisWeek + ']').hide();


  // rendering page-wide tooltips
  $('a[rel=tooltip]').tooltip();




}); // end jquery function
