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

//// APP LOGIC
jQuery(function($) {
  // getting api key for signed in user
  if (document.cookie.indexOf('tempoAthlete') >= 0) {
    var athleteKey = readCookie('tempoAthlete');
  } else {
    return false;
  }

  // getting profile data for signed in user
  $.getJSON( '/api/athlete?key=' + athleteKey, { }, function(data) {
      // getting athlete name
      athleteName = data.athlete.name;
      athleteFirstName = athleteName.split(' ').slice(0, -1).join(' ');

      // appending athlete name to UI
      $('#athlete-dropdown').html(athleteFirstName + '<b class="caret"></b>');
      $("#fitness h3").prepend(athleteFirstName + "'s ");

      // filling out name on account update screen
      $('#inputName').val(athleteName);

      // getting athlete weight in lbs and converting to kg
      weightKg = data.athlete.weight/2.2;

      // filling out weight on account update screen
      $('#inputWeight').val(data.athlete.weight);

      // setting here so it retains the value as it goes through the loop
      var totalFitness = 0;

      // building json power profile array from athlete profile to crunch on
      var fitness = {};
      fitness["5s"] = data.athlete["5s"];
      fitness["1m"] = data.athlete["1m"];
      fitness["5m"] = data.athlete["5m"];
      fitness["20m"] = data.athlete["20m"];

      $.each(fitness, function(i,item){
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
          // this is using the coggan power profile data, so don't change!
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

                // setting value on account update page
                $('#input5s').val(item);
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

                // setting value on account update page
                $('#input1m').val(item);

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

              // setting value on account update page
              $('#input5m').val(item);

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

              // setting value on account update page
              $('#input20m').val(item);

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

    // getting schedule from the DB (eventually this would also be for the signed in user)
    $.getJSON('/api/schedules?week=' + thisWeek, function(data) {
      // getting the week's meta data
      var scheduleWeek        = data.schedules.week;
      var scheduleYear        = data.schedules.year;
      var scheduleType        = data.schedules.type;

      // combining, used for JS parsing later
      var scheduleComposite   = scheduleWeek + "-" + scheduleYear + "-" + scheduleType;

      // getting the activity shortnames for the week
      var scheduleSun         = data.schedules.sun;
      var scheduleMon         = data.schedules.mon;
      var scheduleTue         = data.schedules.tue;
      var scheduleWed         = data.schedules.wed;
      var scheduleThu         = data.schedules.thu;
      var scheduleFri         = data.schedules.fri;
      var scheduleSat         = data.schedules.sat;

      // putting them into an array to pull from the API
      // FIXME make it so it's 1 API call instead of 7 (select * where shortname=blah OR blah2 OR blah3)
      var scheduleThisWeek = [scheduleSun,scheduleMon,scheduleTue,scheduleWed,scheduleThu,scheduleFri,scheduleSat];

      // for each activity in the array
      $.each(scheduleThisWeek, function(i,item){
        // pull details for the specific activity
        // 'item' in this instance is the activity shortname
        $.getJSON('/api/activities?activity=' + item, function(data) {
          var activityName          = data.activities.name;
          var activityShortName     = data.activities.shortname
          var activityType          = data.activities.type;
          var activityWarmup        = data.activities.wu;
          var activityDesc          = data.activities.desc;
          var activityTargetRaw     = data.activities.target;
          var activityInfo          = data.activities.info;
          var activityDuration      = data.activities.duration;
          var activityCooldown      = data.activities.cd;

          // calculations for generating target efforts
          // round up/down to the nearest 5 watts
          var activityTarget        = activityTargetRaw.split('[]');
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
          if(activityShortName == scheduleThisWeek[thisNumDayRaw]) {
            // if today's workout already has a div for this year, don't build any more
            if ($('#workout div[id^=' + scheduleYear + ']').length == 0){
              // building layout for workout
              var workoutBegin = "<div id='" + scheduleYear + "' class='activity'><h5>20" + scheduleYear + " season, week " + thisWeek + "</h5><h4>" + activityName + " / " + activityDuration + " minutes</h4>";
              var workoutEnd = "</div>";

              // appending workout to dashboard
              $('#workout').append(workoutBegin + activityTemplate + workoutEnd);
            }
          }
        }); // end get json
      }); // end schedules each

      // defining the color-coded of workouts being done on a particular week
      // l/e week 10
      if (scheduleWeek <= 10 ) {
        rowClass = "warning";
      } else
      // g/e 11, l/e 24
      if ((scheduleWeek >= 11) && (scheduleWeek <= 24)) {
        rowClass = "success";
      // g/e 25, l/e 27
      } else
      if ((scheduleWeek >= 25) && (scheduleWeek <= 27)) {
        rowClass = "danger";
      // g/e 28, l/e 35
      } else
      if ((scheduleWeek >= 28) && (scheduleWeek <= 35)) {
        rowClass = "success"
      // g/e 36, l/e 39
      } else
      if ((scheduleWeek >= 36) && (scheduleWeek <= 39)) {
        rowClass = "offseason"
      // g/e 40, l/e 53
      } else
      if ((scheduleWeek >= 40) && (scheduleWeek <= 53)) {
        rowClass = "active"
      // if doesn't fit, say off season
      } else {
        rowClass = "offseason";
      }

      // defining the template to list the schedule
      var scheduleTemplate = "<tr class='"+ rowClass + "' id='" + scheduleComposite + "'><td>" + scheduleYear + "</td><td id='" + scheduleWeek + "_mon'><a href='/library#" + scheduleMon + "'>" + scheduleMon + "</a></td><td id='" + scheduleWeek + "_tue'><a href='/library#" + scheduleTue + "'>" + scheduleTue + "</td><td id='" + scheduleWeek + "_wed'><a href='/library#" + scheduleWed + "'>" + scheduleWed + "</td><td id='" + scheduleWeek + "_thu'><a href='/library#" + scheduleThu + "'>" + scheduleThu + "</td><td id='" + scheduleWeek + "_fri'><a href='/library#" + scheduleFri + "'>" + scheduleFri + "</td><td id='" + scheduleWeek + "_sat'><a href='/library#" + scheduleSat + "'>" + scheduleSat + "</td><td id='" + scheduleWeek + "_sun'><a href='/library#" + scheduleSun + "'>" + scheduleSun + "</td></tr>";

      // pushing the template to the schedules schedule
      $('#schedules').append(scheduleTemplate);

      ////RENDERING
      // showing just this week/year
      // FIXME: kinda sloppy, testing to see if the element exists, then showing
      if ($('#schedules tr[id^=' + thisWeek + ']').length > 0){
        $('#schedules tr[id^=' + thisWeek + ']').show();
      }

    // hiding schedule columns that don't apply
    $('#full_schedule').columnManager();
    $('#full_schedule').hideColumns([1,3,4,5,6,7,8,9]);
    $('#full_schedule').showColumns([thisNumDay, (thisNumDay - 1), (thisNumDay - 2)]);

    // counting the amount of workouts and displaying
    var bookCount = $('#workout_library .book').length;
    $('#library h2 small').html(bookCount + ' books');

  }); // end get json call

  ////RENDERING
  // initialize the mini calendar nav
  $('.datepicker').datepicker({
    weekStart: 1,
    keyboardNavigation: false,
    calendarWeeks: true,
    todayHighlight: true,
  });

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
  $("#full_schedule").click(function(scheduleWeek) {
    $('#library_explanation').hide();
    $('#workout_library').show();
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
