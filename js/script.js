/* Author: Mykel Nahorniak

*/

//// INIT
  var user;
  var weightKg;
  var athleteName;
  var powerProfile = {};

  var thisYear = Date.today().getYear().toString().slice(1);
  var thisMonth = Date.today().getMonth();
  var thisWeek = Date.today().getISOWeek();
  var thisDayRaw = Date.today().toString('ddd');
  var thisDay = thisDayRaw.toLowerCase();
  var thisNumDayRaw = Date.today().getDay();
  var thisNumDay = thisNumDayRaw + 3;

  // because sunday is "end of week" according to tempo, but is "beginning of week" to jquery,
  // hardcoding sunday to be the 10th column
  if (thisNumDayRaw == 0) {
    thisNumDay = 10;
  }

//// UTILITY FUNCTIONS
function compareNum(a, b){
  return (a < b ? this >= a && this <= b : this >= b && this <= a);
}

function roundNum(num, nearest) {
  return (Math.round(num / nearest) * nearest);
}

function eval_fragment(formula_text, lookup_table) {
  var formula = formula_text.match(/\(\[(.*?)\]\*([0-9|.]+)\)/i);
  var coefficient_key = formula[1];
  var number = parseFloat(formula[2]);


  var coefficient = lookup_table[coefficient_key];
  //console.log(coefficient * number);

  var exactTarget = (coefficient * number);
  var roundedTarget = roundNum(exactTarget,5);

  return(roundedTarget);
}

function eval_target(input_string) {
    // first match formulas ([?]*?)
    var formulas = input_string.match(/\(\[(.*?)\]\*([0-9|.]+)\)/ig);

    // evaluate individual fragments
    var replace = [];
    for( i = 0; i < formulas.length; i++ ) {
        replace.push({
            "from": formulas[i],
            "to": eval_fragment(formulas[i], powerProfile)
        });
    }

    // do search-replace on the text
    for( i = 0; i < replace.length; i++ ) {
        input_string = input_string.replace(
            replace[i].from,
            Math.round(replace[i].to)
        );
    }

    return(input_string );
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

function scrollToSelectedItem() {
  $('html,body').animate({scrollTop:$(location.hash).offset().top}, 500);
}

//// APP LOGIC
jQuery(function($) {


//// INIT MINICAL NAV
$('.datepicker').datepicker({
    weekStart: 1,
    keyboardNavigation: false,
    calendarWeeks: true,
    todayHighlight: true,
    /*
    beforeShowDay: function (date) {
      if (date.getMonth() == (new Date()).getMonth())
        switch (date.getDate()){
          case 4:
            return {
              tooltip: 'Example tooltip',
              classes: 'active'
            };

        }
    }
    */
});

//// CALENDAR
  // getting json data
  var athlete = readCookie('tempoAthlete');

  $.getJSON('data/user_' + athlete + '.json', function(data) {

//// CONFIGURATION
    $.each(data.config, function(i,item){
      // getting athlete weight in lbs and converting to kg
      weightKg    = item.weight/2.2;

      // getting athlete name
      athleteName = item.name.split(' ').slice(0, -1).join(' ');


      $('#athlete-dropdown').html(athleteName + '<b class="caret"></b>');
      $("#fitness h3").prepend(athleteName + "'s ");
    }); // end config each

////FITNESS
    // setting here so it retains the value as it goes through the loop
    var totalFitness = 0;

    $.each(data.fitness[0], function(i,item){
      // time interval (1s, 1m, 5m, etc.)
      fitnessTime  = i;
      fitnessPower = item;

      powerProfile[fitnessTime] = fitnessPower;

      // only recording power profile times
      if (fitnessTime == "5s" || fitnessTime == "1m" || fitnessTime == "5m" || fitnessTime == "20m") {
        // wattage at a time interval (150, 200, 250, etc.)

        // watts per kilo (power-to-weight ratio)
        var wKg = (item/weightKg).toFixed(2);

        // adding the current power value to the global power number (to determine progress bar percentages later)
        totalFitness += Number(fitnessPower);

        //set style on progress-bar-success
        var progressClass;
        var bestCategory;
        var fitnessPercentage;

        // calculating best category and the overall percentage of world class you are
        switch(fitnessTime) {
          case '5s':
            progressClass = "danger";
            var fitnessTop = 23.50;
            fitnessPercentage = ((parseInt(wKg) / parseInt(fitnessTop)) * 100).toFixed(0);

              if (wKg > 20.79) {
                bestCategory = "World Class";
              } else if (wKg > 19.43 && wKg <= 20.78) {
                bestCategory = "division I/II pro";
              } else if (wKg > 18.07 && wKg <= 19.42) {
                bestCategory = "division III pro";
              } else if (wKg > 16.71 && wKg <= 18.06) {
                bestCategory = "cat 1";
              } else if (wKg > 15.35 && wKg <= 16.70) {
                bestCategory = "cat 2";
              } else if (wKg > 13.99 && wKg <= 15.34) {
                bestCategory = "cat 3";
              } else if (wKg > 12.63 && wKg <= 13.98) {
                bestCategory = "cat 4";
              } else if (wKg > 11.26 && wKg <= 12.62) {
                bestCategory = "cat 5";
              } else if (wKg <= 11.26) {
                bestCategory = "untrained";
              }


            break;
          case '1m':
            progressClass = "warning";
            var fitnessTop = 11.50;
            fitnessPercentage = ((parseInt(wKg) / parseInt(fitnessTop)) * 100).toFixed(0);

              // 1m power profile
              if (wKg > 10.31) {
                bestCategory = "world class";
              } else if (wKg > 9.71 && wKg <= 10.30) {
                bestCategory = "division I/II pro";
              } else if (wKg > 9.11 && wKg <= 9.70) {
                bestCategory = "division III pro";
              } else if (wKg > 8.51 && wKg <= 9.10) {
                bestCategory = "cat 1";
              } else if (wKg > 7.91 && wKg <= 8.50) {
                bestCategory = "cat 2";
              } else if (wKg > 7.31 && wKg <= 7.90) {
                bestCategory = "cat 3";
              } else if (wKg > 6.71 && wKg <= 7.30) {
                bestCategory = "cat 4";
              } else if (wKg > 6.11 && wKg <= 6.70) {
                bestCategory = "cat 5";
              } else if (wKg <= 6.10) {
                bestCategory = "untrained";
              }

            break;
          case '5m':
            progressClass = "info";
            var fitnessTop = 7.80;
            fitnessPercentage = ((parseInt(wKg) / parseInt(fitnessTop)) * 100).toFixed(0);

            // 5m power profile
            if (wKg > 6.69) {
              bestCategory = "world class";
            } else if (wKg > 6.13 && wKg <= 6.68) {
              bestCategory = "division I/II pro";
            } else if (wKg > 5.57 && wKg <= 6.12) {
              bestCategory = "division III pro";
            } else if (wKg > 5.01 && wKg <= 5.56) {
              bestCategory = "cat 1";
            } else if (wKg > 4.45 && wKg <= 5.00) {
              bestCategory = "cat 2";
            } else if (wKg > 3.89 && wKg <= 4.44) {
              bestCategory = "cat 3";
            } else if (wKg > 3.31 && wKg <= 3.88) {
              bestCategory = "cat 4";
            } else if (wKg > 2.75 && wKg <= 3.30) {
              bestCategory = "cat 5";
            } else if (wKg <= 2.74) {
              bestCategory = "untrained";
            }

            break;
          case '20m':
            progressClass = "success";
            var fitnessTop = 6.66;
            fitnessPercentage = ((parseInt(wKg) / parseInt(fitnessTop)) * 100).toFixed(0);

            // 20m power profile
            if (wKg > 5.71) {
              bestCategory = "world class";
            } else if (wKg > 5.23 && wKg <= 5.70) {
              bestCategory = "division I/II pro";
            } else if (wKg > 4.75 && wKg <= 5.22) {
              bestCategory = "division III pro";
            } else if (wKg > 4.27 && wKg <= 4.74) {
              bestCategory = "cat 1";
            } else if (wKg > 3.79 && wKg <= 4.26) {
              bestCategory = "cat 2";
            } else if (wKg > 3.31 && wKg <= 3.78) {
              bestCategory = "cat 3";
            } else if (wKg > 2.83 && wKg <= 3.30) {
              bestCategory = "cat 4";
            } else if (wKg > 2.35 && wKg <= 2.82) {
              bestCategory = "cat 5";
            } else if (wKg <= 2.34) {
              bestCategory = "untrained";
            }

            break;
          default:
            progressClass = "info";
        }

        // adding progress bar for the zone to the display
        console.log(fitnessTime + " is at " + fitnessPercentage + " of 100%");

        var fitnessTemplate = "\
          <div class='progress'> \
            <div style='width:" + fitnessPercentage + "%' id='p" + fitnessTime + "' class='progress-bar progress-bar-" + progressClass + "'> \
              <span>" + fitnessTime + " - " + fitnessPower + " watts - " +  wKg + " w/Kg - " + bestCategory + "</span> \
            </div> \
          </div>";

        $('#score').append(fitnessTemplate);
      }
    });
});


$.getJSON('data/workouts.json', function(data) {
//// SCHEDULES
    // get a list of all the historical schedules and append to list
    $.each(data.schedules, function(i,item){
      // getting raw workout name from schedules data
      var scheduleNameRaw        = item.name;

      // splitting out week number
      var scheduleName           = scheduleNameRaw.split('-')[0];

      // splitting out year number
      var scheduleYear           = scheduleNameRaw.split('-')[1];

      // splitting out workout shortname
      var scheduleType           = scheduleNameRaw.split('-')[2];

      var scheduleSun = item.sun.workoutname
      var scheduleMon = item.mon.workoutname
      var scheduleTue = item.tue.workoutname
      var scheduleWed = item.wed.workoutname
      var scheduleThu = item.thu.workoutname
      var scheduleFri = item.fri.workoutname
      var scheduleSat = item.sat.workoutname

      // if the data pulled is for this week, move forward
      if((scheduleName == thisWeek)) {

        // dynamically pulling data depending on what today's date is
        var calendarShortName = item[thisDay].workoutname;

        // pull all of this week's activities in the json file
        $.each(data.activities, function(i,item){
          var activityName          = item.name;
          var activityShortName     = item.shortname
          var activityType          = item.type;
          var activityWarmup        = item.wu;
          var activityDesc          = item.desc;
          var activityTargetRaw     = item.target;
          var activityInfo          = item.info;
          var activityDuration      = item.duration;
          var activityCooldown      = item.cd;

          // calculations for generating target efforts
          // round up/down to the nearest 5 watts
          //var activityTarget        = activityTargetRaw.split('[]');
          if (activityTargetRaw != "") {
            if (activityTargetRaw.indexOf('(') === -1) {
              var activityTarget = activityTargetRaw;
            } else {
              var activityTarget = eval_target(activityTargetRaw);
            }
          }

          // rendering LIBRARY and WORKOUT information
          var activityTemplate = "";

          if(activityWarmup != "") {
            activityTemplate += "<h6>Warm Up</h6><p>" + activityWarmup + "</p>";
          }

          if(activityDesc != "") {
            activityTemplate += "<h6>Workout</h6><p>" + activityDesc + "</p>";
          }

          if(activityTargetRaw != "") {
            activityTemplate += "<h6 class='activity_target'>Target Effort</h6><p>" + activityTarget + "</p>";
          }

          // appending things to coach comments
          // show this on thursday only -you're usually off on fridays-
          if(activityInfo != "") {
            activityTemplate += "<h6 class='activity_info'>Coach Comments</h6><p>" + activityInfo + "</p>";
          }

          if (thisNumDayRaw == 4) {
            activityInfo += "<p><span class='activity_info_warning'>No hard workouts today if you're racing on Sunday.</span></p>";
          }
          // show this on friday and saturday only
          if ((thisNumDayRaw == 5) || (thisNumDayRaw == 6)) {
            activityInfo += "<p><span class='activity_info_raceprep'>If racing tomorrow, do a <a href='#raceprep'>race prep</a>.</span></p>";
          }
          // show this on saturday and sunday only
          if ((thisNumDayRaw == 6) || (thisNumDayRaw == 0)) {
            activityInfo += "<p><span class='activity_info_racewarmup'>If racing today, do a <a href='#racewarmup'>race warm up</a>.</span></p>";
          }

          if (((thisWeek >= 11) && (thisWeek <= 24)) ||
             ((thisWeek >= 25) && (thisWeek <= 27)) ||
             ((thisWeek >= 28) && (thisWeek <= 35))) {
            activityTemplate += "<h6 class='activity_info_maintenance'>Racing Season Maintenance</h6><p class='activity_info_maintenance'>If you felt weak responding to attacks, do AC work. If you felt like you had nothing left at the end do VO2 and tempo. This choice will be automated in the future.</p>"
          }

          if(activityCooldown != "") {
            activityTemplate += "<h6>Cool Down</h6><p>" + activityCooldown + "</p>";
          }


          // if the activity hasn't already been added to the library, add it to the LIBRARY template
          if($('#' + activityShortName).length == 0 ){
            var libraryBegin = "<div id='" + activityShortName + "' data-duration='" + activityDuration + "' class='book'><h4>" + activityName + " / " + activityDuration + " minutes</h4>";
            var libraryEnd = "<hr class='soften'></div>";

            $('#workout_library').append(libraryBegin + activityTemplate + libraryEnd);
          }

          // if this activity is either today, or occurred on this day in the past, add it to the WORKOUT template
          if(activityShortName == calendarShortName) {
            var workoutBegin = "<div id='" + scheduleYear + "' class='activity'><h5>20" + scheduleYear + " season, week " + thisWeek + "</h5><h4>" + activityName + " / " + activityDuration + " minutes</h4>";
            var workoutEnd = "</div>";

            $('#workout').append(workoutBegin + activityTemplate + workoutEnd);
          }
        }); // end activities each
      }

      // defining the color-coded of workouts being done on a particular week
      // l/e week 10
      if (scheduleName <= 10 ) {
        rowClass = "warning";
      } else
      // g/e 11, l/e 24
      if ((scheduleName >= 11) && (scheduleName <= 24)) {
        rowClass = "success";
      // g/e 25, l/e 27
      } else
      if ((scheduleName >= 25) && (scheduleName <= 27)) {
        rowClass = "danger";
      // g/e 28, l/e 35
      } else
      if ((scheduleName >= 28) && (scheduleName <= 35)) {
        rowClass = "success"
      // g/e 36, l/e 39
      } else
      if ((scheduleName >= 36) && (scheduleName <= 39)) {
        rowClass = "offseason"
      // g/e 40, l/e 53
      } else
      if ((scheduleName >= 40) && (scheduleName <= 53)) {
        rowClass = "active"
      // if doesn't fit, say off season
      } else {
        rowClass = "offseason";
      }

      // defining the template to list the schedule
      var scheduleTemplate = "<tr class='"+ rowClass + "' id='" + scheduleNameRaw + "'><td>" + scheduleYear + "</td><td id='" + scheduleName + "_mon'><a href='?p=library#" + scheduleMon + "'>" + scheduleMon + "</a></td><td id='" + scheduleName + "_tue'><a href='?p=library#" + scheduleTue + "'>" + scheduleTue + "</td><td id='" + scheduleName + "_wed'><a href='?p=library#" + scheduleWed + "'>" + scheduleWed + "</td><td id='" + scheduleName + "_thu'><a href='?p=library#" + scheduleThu + "'>" + scheduleThu + "</td><td id='" + scheduleName + "_fri'><a href='?p=library#" + scheduleFri + "'>" + scheduleFri + "</td><td id='" + scheduleName + "_sat'><a href='?p=library#" + scheduleSat + "'>" + scheduleSat + "</td><td id='" + scheduleName + "_sun'><a href='?p=library#" + scheduleSun + "'>" + scheduleSun + "</td></tr>";

      // pushing the template to the schedules schedule
      $('#schedules').append(scheduleTemplate);

    }); // end schedules each


////RENDERING
    // showing just this week/year
    // FIXME: kinda sloppy, testing to see if the element exists, then showing
    if ($('#schedules tr[id^=' + thisWeek + ']').length > 0){
      $('#schedules tr[id^=' + thisWeek + ']').show();
    }

    if ($('#workout .activity:last').length > 0){
      $('#workout .activity:last').show();
    }



    // hiding schedule columns that don't apply
    $('#full_schedule').columnManager();
    $('#full_schedule').hideColumns([1,3,4,5,6,7,8,9]);
    $('#full_schedule').showColumns([thisNumDay, (thisNumDay - 1), (thisNumDay - 2)]);

    // counting the amount of workouts and displaying
    var bookCount = $('#workout_library .book').length;
    $('#library h2 small').html(bookCount + ' books');

  }); // end get json call


/////GENERATING FUTURE
/*

logic
=====

in each month, figure out what the weakest zone is on the power profile by counting distance from the top (and/or the amount of green cells)

then, depending on the month, decide which zones are "open" for training. out of those zones, pick the weakest one and set that for the next block

//FIXME: use stored values to populate placeholders in setup form


if ((thisWeek == 47) || (thisWeek == 43) || (thisWeek == 39)) {
  if (thisDay == 'sun') {
    // display the 20 min power form element, asking them to enter their most recent 20 min test result
    $('#setup').show();
    $('#setup .control-group').not('id[m20]').hide();
  }

}


weeks
01-04 - VO2 OR AC OR FTP
O5-10 - VO2 OR AC OR FTP
11-20 - VO2 OR AC
21-35 - MAINTENANCE (no logic)
36-39 - OFF (no logic)
40-41 - day 1 and day 2 testing
42-47 - TEMPO
48-52 - FTP




*/


////RENDERING
  // scrolling to window location if there's a hash on the page (doing this at the end when everything is rendered)
  if(window.location.hash) {
    setTimeout(scrollToSelectedItem,0);
    //$('html,body').animate({scrollTop:$(location.hash).offset().top}, 500);
  }

  // making today bold
  $("[id*="+thisDay+"]").css('font-weight', 'bold');

  // setting the width of the progress bar
  var progressBar = thisNumDay*10;
  $("#week_progress").css('width', progressBar + '%');

  // displaying the week on the calendar page
  $("#calendar h5").append(thisWeek);

////CLICK HANDLERS FOR RENDERING
  // showing all workouts historically associated with this week
  $("#thisyearonly").click(function() {
    $('#workout .activity').not(':last').toggle(200);
    return false;
  });

  // showing all schedules
  $("#thisweekonly").click(function() {
    $('#schedules tr').not('[id^=' + thisWeek + ']').toggle();
    $('#full_schedule').showColumns([1,3,4,5,6,7,8,9]);
    return false;
  });

  // when a workout is clicked, unhide the library, then jump there
  $("#full_schedule").click(function(scheduleName) {
    $('#library_explanation').hide();
    $('#workout_library').show();
  });

  $("#havepowermeter").click(function() {
    $('#powerbests').toggle();
  });

  // when a library type is selected, hide all others except the category you picked. support for multiple
  $(".library_select").click(function() {
    var workout_id_raw = $(this).attr("id");
    var workout_id = workout_id_raw.replace(/\s{2,}/g, ' ').split(' ');
      console.log(workout_id);

    if (workout_id == "all") {
      $("#workout_library div").show();
    } else {
      // hide everything
      $("#workout_library div").hide();

      // only show the things that match the workout type(s) selected
      $.each(workout_id, function( index, value ) {
        $("#workout_library div[id^='" + value + "']").show();
      });
    }
  });

  // when a library duration is selected, hide all others except the category you picked. support for multiple
  $(".duration_select").click(function() {
    var duration_id = $(this).attr("data-duration");

    console.log(duration_id);

    if (duration_id == "all") {
      $("#workout_library div").show();
    } else {
      // hide everything
      $("#workout_library div").hide();

      // only show things that match the time selected
      $('[data-duration]').filter(function() {
        return $(this).data('duration') <= duration_id;
      }).show();

    }
  });

}); // end jquery function
