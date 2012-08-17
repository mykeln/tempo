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
  var thisActivity;

  $('#week_num').html('WEEK ' + thisWeek);

  // getting json data
  $.getJSON('data/workouts.js', function(data) {

    // get a list of all the historical schedules and append to list
    $.each(data.schedules, function(i,item){
      var scheduleNameRaw        = item.name;
      var scheduleName           = scheduleNameRaw.split('-')[0];
      var scheduleType           = scheduleNameRaw.split('-')[2];
      var scheduleMon            = item.mon.workoutname;
      var scheduleTue            = item.tue.workoutname;
      var scheduleWed            = item.wed.workoutname;
      var scheduleThu            = item.thu.workoutname;
      var scheduleFri            = item.fri.workoutname;
      var scheduleSat            = item.sat.workoutname;
      var scheduleSun            = item.sun.workoutname;

      // defining the type of workouts being done on a particular week
      if (scheduleName <= 10 ) {
        rowClass = "sharpen";
      } else
      if (((scheduleName >= 11) && (scheduleName <= 24)) || ((scheduleName >= 28) && (scheduleName <= 40))){
        rowClass = "racing";
      } else
      if ((scheduleName >= 25) && (scheduleName <= 27)) {
        rowClass = "peak";
      } else
      if ((scheduleName >= 41) && (scheduleName <= 53)) {
        rowClass = "base"
      } else {
        rowClass = "offseason";
      }

      // defining the activity to display for this week
      if (scheduleName == thisWeek) {
        if (thisDayRaw == 'Mon') {
          thisActivity += scheduleMon + "AND";
        } else
        if (thisDayRaw == 'Tue') {
          thisActivity += scheduleTue + "AND";
        } else
        if (thisDayRaw == 'Wed') {
          thisActivity += scheduleWed + "AND";
        } else
        if (thisDayRaw == 'Thu') {
          thisActivity += scheduleThu + "AND";
        } else
        if (thisDayRaw == 'Fri') {
          thisActivity += scheduleFri + "AND";
        } else
        if (thisDayRaw == 'Sat') {
          thisActivity += scheduleSat + "AND";
        } else
        if (thisDayRaw == 'Sun') {
          thisActivity += scheduleSun + "AND";
        } else {
          thisActivity = 'No DataAND';
        }
      }

      // defining the template to list the schedule
      var scheduleTemplate = "<tr class='"+ rowClass + "' id='" + scheduleNameRaw + "'><td>" + scheduleType + "</td><td>" + scheduleName + "</td><td id='" + scheduleName + "_mon'>" + scheduleMon + "</td><td id='" + scheduleName + "_tue'>" + scheduleTue + "</td><td id='" + scheduleName + "_wed'>" + scheduleWed + "</td><td id='" + scheduleName + "_thu'>" + scheduleThu + "</td><td id='" + scheduleName + "_fri'>" + scheduleFri + "</td><td id='" + scheduleName + "_sat'>" + scheduleSat + "</td><td id='" + scheduleName + "_sun'>" + scheduleSun + "</td></tr>";

      // pushing the template to the schedules schedule
      $('#schedules').append(scheduleTemplate);

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
        if(this == activityShortName){

          // defining the template to list the workout
          var activityTemplate = "<h2>" + activityName + "</h2><h6>Warm Up</h6><p>" + activityWarmup + "</p><h6>Workout</h6><p>" + activityDesc + "</p><h6 class='activity_info'>Coach Comments</h6><p>" + activityInfo + "</p><h6>Cool Down</h6><p>" + activityCooldown + "</p>";

          $('#workout').append(activityTemplate);
        }
      });


      // if there aren't any coach comments, hide the element for this specific activity
      if(activityInfo == ""){
        $('#' + activityShortName + ' h6.activity_info').hide();
      }

    }); // end activities each






  }); // end get json call



  $("#thisweekonly").click(function() {
    // re-showing data for this week
   $('#schedules tr').not('[id^=' + thisWeek + ']').hide();

   return false;
  });


  // rendering page-wide tooltips
  $('a[rel=tooltip]').tooltip();




}); // end jquery function
