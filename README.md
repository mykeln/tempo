chainiac
=====
Chainiac looks at historical workout data and extrapolates to determine future workouts. The goal is to achieve 90% of what a coach does. The inherent flaw: dynamically changing plans based on results.

philosophy
=====
each week is part of a "block," a 4-week period in chainiac terminology. each week is manually named after the "essence" of the week of workouts. In other words, if I did mostly endurance rides during the week, but two tempo workouts, that'd be a "tempo week." These weeks change depending on which part of the block it is in, so they ladder up: tempoblock1, tempoblock2, tempoblock3, etc. At the end of each block in the off season, there is a test.

Each week, block, year has a pattern. I now have four years of solid workout history to work from. The goal is to look at this history and say, for example:
- it's week 43. three of the past four years, you were doing tempoblock3 at this point, so go ahead and do tempoblock3 this year, too"

challenges
=====
- if it's two-and-two, show both? Show one with the alternate, favoring the more recent years?
- storing the extrapolation, so i can continue to record not just the rides i did, but what i was prescribed

known issues
=====
- today's workout stuck with green background when "previous years" is toggled again

don't forget
=====
- Emails from coach lemond with different subjects for Each day
- Weeks out from peak week determines weak spot focus (supports australia, west coast, etc.)
- Weeks within peak week determines maintenance
- adjust 'fitness' graph according to the following power measurement tools:
  - Hub 0%
  - Crank arm -15%
  - Bottom bracket -13%
  - Pedal -17%
- library is currently only pulling this week's workouts
- schedule is currently only pulling history for this week
- today's workout is broken

logic
=====

in each month, figure out what the weakest zone is on the power profile by counting distance from the top (and/or the amount of green cells)

then, depending on the month, decide which zones are "open" for training. out of those zones, pick the weakest one and set that for the next block

//FIXME: use stored values to populate placeholders in setup form
FIXME: source code is on the .phps files: http://helper.pp19dd.com/


if ((thisWeek == 47) || (thisWeek == 43) || (thisWeek == 39)) {
  if (thisDay == 'sun') {
    // display the 20 min power form element, asking them to enter their most recent 20 min test result
    $('#setup').show();
    $('#setup .form-group').not('id[m20]').hide();
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