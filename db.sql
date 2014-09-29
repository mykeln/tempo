CREATE TABLE IF NOT EXISTS athletes (
athlete_id int(5) NOT NULL AUTO_INCREMENT,
created_date DATE NOT NULL,
email varchar(255) NOT NULL,

name varchar(255) NOT NULL,
weight int(3) NOT NULL,
1s int(4) NOT NULL,
5s int(4) NOT NULL,
30s int(4) NOT NULL,
1m int(4) NOT NULL,
5m int(3) NOT NULL,
10m int(3) NOT NULL,
20m int(3) NOT NULL,
60m int(3) NOT NULL,
PRIMARY KEY(athlete_id)
);

INSERT INTO athletes VALUES(
'',
NOW(),
'myke@karmcity.com',
'Mykel Nahorniak',
145,
1705,
1393,
971,
610,
406,
350,
330,
300
);
