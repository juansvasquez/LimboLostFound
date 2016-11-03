#This file creates the limbo database, as well as the users, stuff, and locations tables.
#Author: Juan S. Vasquez, Erina Caferra
#Version 1.0

drop database if exists limbo_db ;
create database limbo_db ;
use limbo_db ;

CREATE TABLE IF NOT EXISTS admins(
user_id INT UNSIGNED NOT NULL AUTO_INCREMENT ,
first_name VARCHAR(20) NOT NULL ,
last_name VARCHAR(40) NOT NULL ,
email VARCHAR(60) NOT NULL ,
pass CHAR(40) NOT NULL ,
reg_date DATETIME NOT NULL,
PRIMARY KEY ( user_id ) ,
UNIQUE (email)
);

INSERT INTO admins ( email, pass, reg_date)
VALUES ("admin" , "gaze11e", Now() );

CREATE TABLE IF NOT EXISTS stuff(
id INT PRIMARY KEY AUTO_INCREMENT ,
location_id INT NOT NULL ,
description TEXT NOT NULL ,
model SET("Electronic" , "Bags" , "Apparel" , "Miscellaneous") NOT NULL ,
color TEXT NOT NULL,
dt DATETIME NOT NULL ,
limbo_date DATE NOT NULL ,
limbo_time TIME NOT NULL ,
status SET("Found" , "Lost" , "Claimed") NOT NULL ,
item TEXT NOT NULL ,
contact_email TEXT NOT NULL,
contact_phone TEXT NOT NULL
);

INSERT INTO stuff ( location_id, description, model, color, dt, limbo_date, limbo_time, status, item, contact_email, contact_phone )
VALUES
( 16 ,
"I found this textbook inside of my backpack, I must have accidentally stolen it." ,
"Miscellaneous" ,
"Blue and green" ,
'2015-11-04 09:46:07' ,
'2015-11-04' ,
'09:45:00' ,
"Found" , 
"Neurobiology Textbook" ,
"name5@email.com" ,
"1-800-555-7890"),
( 14 ,
"I really really really love New York and every second I spend away from my hat slowly drains my soul." ,
"Apparel" ,
"White and red" ,
'2015-11-05 05:57:59' ,
'2015-11-05' ,
'05:30:00' ,
"Lost" , 
"I-<3-NY Hat" ,
"name4@email.com" ,
"1-800-555-5678"),
( 11 ,
"It appears I've lost my wallet. It is very valuable and I would like it back." ,
"Miscellaneous" ,
"Brown" ,
'2015-11-06 21:11:47' ,
'2015-11-06' ,
'21:00:00' ,
"Lost" , 
"Wallet with $9001" ,
"name3@email.com" ,
"1-800-55-1234"),
( 2 ,
"I found these sweet shades by a book shelf in the basement." ,
"Apparel" ,
"Red" ,
'2015-11-07 12:09:55' ,
'2015-11-07' ,
'12:00:00' ,
"Found" ,
"Deal-With-It Sunglasses" ,
"name2@email.com" ,
"1-800-555-6969"),
( 7 ,
"I found this Nike Knapsack in a second floor classroom, next to the door." ,
"Bags" ,
"Black and white" ,
'2015-11-08 13:08:38' ,
'2015-11-08' ,
'13:00:00' ,
"Found" ,
"Nike Knapsack" ,
"name1@email.com" ,
"1-800-555-4200" ),
( 6 , 
"My cell phone is a black iPhone 6S model with a black rubber case. It is very new. I will provide a reward upon its return." ,
"Electronic" ,
"Black" ,
'2015-11-09 18:56:04' ,
'2015-11-09' ,
'18:00:00' ,
"Lost",
"iPhone 6S" ,
"name@email.com" ,
"1-800-555-0000" );

CREATE TABLE IF NOT EXISTS locations(
id INT PRIMARY KEY AUTO_INCREMENT,
create_date DATETIME NOT NULL,
update_date DATETIME NOT NULL,
name TEXT NOT NULL
);

INSERT INTO locations(create_date, update_date, name)
VALUES (Now(), Now(), "Byrne House"),
(Now(), Now(), "James A. Cannavino Library"),
(Now(), Now(), "Champagnat Hall"),
(Now(), Now(), "Our Lady Seat of Wisdom Chapel"),
(Now(), Now(), "Cornell Boathouse"),
(Now(), Now(), "Donnelly Hall"),
(Now(), Now(), "Margaret M. and Charles H. Dyson Center"),
(Now(), Now(), "Fern Tor"),
(Now(), Now(), "Fontaine Annex"),
(Now(), Now(), "Fontaine Hall"),
(Now(), Now(), "Foy Townhouses"),
(Now(), Now(), "Fulton Street Townhouses"),
(Now(), Now(), "Lower Fulton Townhouses"),
(Now(), Now(), "Gartland Apartments"),
(Now(), Now(), "Greystone Hall"),
(Now(), Now(), "Hancock Center"),
(Now(), Now(), "Kieran Gatehouse"),
(Now(), Now(), "Kirk House"),
(Now(), Now(), "Leo Hall"),
(Now(), Now(), "Longview Park"),
(Now(), Now(), "Lowell Thomas Communications Center"),
(Now(), Now(), "Marian Hall"),
(Now(), Now(), "Marist Boathouse"),
(Now(), Now(), "James J. McCann Recreational Center"),
(Now(), Now(), "Mid-Rise Hall"),
(Now(), Now(), "St. Peter's"),
(Now(), Now(), "Sheahan Hall"),
(Now(), Now(), "Steel Plant Art Studios and Gallery"),
(Now(), Now(), "Student Center/Rotunda"),
(Now(), Now(), "Tennis Pavilion"),
(Now(), Now(), "Tenney Stadium"),
(Now(), Now(), "Lower Townhouses"),
(Now(), Now(), "Lower West Cedar Townhouses"),
(Now(), Now(), "Upper West Ceder Townhouses");

SELECT * FROM admins;
SELECT * FROM stuff;
SELECT * FROM locations;

EXPLAIN admins;
EXPLAIN stuff;
EXPLAIN locations;