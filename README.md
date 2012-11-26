tempo
=====
Tempo looks at historical workout data and extrapolates to determine future workouts. The goal is to achieve 90% of what a coach does. The inherent flaw: dynamically changing plans based on results.

philosophy
=====
each week is part of a "block," a 4-week period in tempo terminology. each week is manually named after the "essence" of the week of workouts. In other words, if I did mostly endurance rides during the week, but two tempo workouts, that'd be a "tempo week." These weeks change depending on which part of the block it is in, so they ladder up: tempoblock1, tempoblock2, tempoblock3, etc. At the end of each block in the off season, there is a test.

Each week, block, year has a pattern. I now have four years of solid workout history to work from. The goal is to look at this history and say, for example:
- it's week 43. three of the past four years, you were doing tempoblock3 at this point, so go ahead and do tempoblock3 this year, too"

challenges
=====
- if it's two-and-two, show both? Show one with the alternate, favoring the more recent years?
- storing the extrapolation, so i can continue to record not just the rides i did, but what i was prescribed



logic
=====

ask user to enter the following most recent power test results:

5s
1m
5m
20m

in each month, figure out what the weakest zone is on the power profile by counting distance from the top (and/or the amount of green cells)

then, depending on the month, decide which zones are "open" for training. out of those zones, pick the weakest one and set that for the next block

weeks
01-04 - VO2 OR AC OR THRESHOLD
O5-10 - VO2 OR AC
11-20 - VO2 OR AC OR THRESHOLD
21-35 - MAINTENANCE (no logic)
36-39 - OFF (no logic)
40-41 - day 1 and day 2 testing
42-52 - TRESHOLD




it's not really a huge amount of data, so you could build the prefix of the key to look for (var key = "WW-YY-", obviously with to make it the current date) and then check each item (like if(name.substr(0, 5) == key))
