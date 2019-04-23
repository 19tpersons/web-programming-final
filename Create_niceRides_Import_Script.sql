
/***********************************************************************************/
/* Import Table Script                                                             */
/* Shane Birdsall, Tyler Persons, Brook Stang, Snowflower Yang                     */
/* 4-11-19                                                                         */
/* Version 1	                  		                                   */
/* 4 Tables:                                        	                           */
/*    User                                                               	   */
/*    Station                                                                      */
/*    Bike	                                                                   */
/*    Trip	                                                                   */
/* Niceride Analysis                                                               */
/***********************************************************************************/

USE niceRides; /*default database*/

/*Load bike data*/
INSERT INTO BIKE
SELECT DISTINCT bikeid, `bike type`
FROM RAWDATA;

/*Load user data*/
INSERT INTO USER(Gender, UserType, BirthYear)
SELECT Gender, UserType, `birth year`
FROM RAWDATA;

/*Load station data*/
INSERT INTO STATION(StationID, StationName, Latitude, Longitude)
SELECT DISTINCT `start station id`, `start station name`, `start station latitude`, `start station longitude`
FROM RAWDATA;

/*Load trip data*/
INSERT INTO TRIP(StartStationID, EndStationID, StartTime, EndTime, BikeID, UserID)
SELECT r.`start station id`, r.`end station id`, r.start_time, r.end_time, r.bikeid, u.UserID
FROM RAWDATA r, USER u
Where r.Gender = u.Gender AND r.UserType = u.UserType AND r.`birth year` = u.BirthYear;


